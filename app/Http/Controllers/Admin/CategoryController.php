<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * แสดงรายการหมวดหมู่ทั้งหมด
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * แสดงฟอร์มสำหรับสร้างหมวดหมู่ใหม่
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * บันทึกหมวดหมู่ใหม่ลงในฐานข้อมูล
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            try {
                // บันทึกข้อมูลไฟล์ที่อัปโหลดมาเพื่อดีบัก
                Log::info('Uploading file', [
                    'originalName' => $request->file('image')->getClientOriginalName(),
                    'size' => $request->file('image')->getSize(),
                    'mimeType' => $request->file('image')->getMimeType()
                ]);

                // บันทึกไฟล์ในโฟลเดอร์ categories ภายใต้ disk 'public'
                $path = $request->file('image')->store('categories', 'public');
                
                // บันทึกผลลัพธ์
                Log::info('File stored at path', ['path' => $path]);
                
                // กำหนดพาธสำหรับฐานข้อมูล
                $validated['image'] = '/storage/' . $path;
                
                // บันทึกพาธที่จะบันทึกลงฐานข้อมูล
                Log::info('Path to be saved in database', ['imagePath' => $validated['image']]);
            } catch (\Exception $e) {
                Log::error('Error uploading file', ['error' => $e->getMessage()]);
                return back()->withErrors(['image' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' . $e->getMessage()]);
            }
        }

        try {
            $category = Category::create($validated);
            Log::info('Category created', ['id' => $category->id, 'name' => $category->name]);
            
            return redirect()->route('admin.categories.index')
                            ->with('success', 'หมวดหมู่ถูกสร้างเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            Log::error('Error creating category', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการสร้างหมวดหมู่: ' . $e->getMessage()]);
        }
    }

    /**
     * แสดงข้อมูลของหมวดหมู่ที่ระบุ
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * แสดงฟอร์มสำหรับแก้ไขหมวดหมู่ที่ระบุ
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * อัปเดตข้อมูลของหมวดหมู่ที่ระบุในฐานข้อมูล
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            try {
                // บันทึกข้อมูลไฟล์ที่อัปโหลดมาเพื่อดีบัก
                Log::info('Updating image for category', [
                    'category_id' => $category->id,
                    'originalName' => $request->file('image')->getClientOriginalName()
                ]);

                // ลบรูปภาพเก่า ถ้ามี
                if ($category->image) {
                    $oldImagePath = str_replace('/storage/', '', $category->image);
                    if (Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                        Log::info('Deleted old image', ['path' => $oldImagePath]);
                    } else {
                        Log::warning('Old image not found', ['path' => $oldImagePath]);
                    }
                }
                
                // บันทึกไฟล์ใหม่
                $path = $request->file('image')->store('categories', 'public');
                
                // บันทึกผลลัพธ์
                Log::info('New file stored at path', ['path' => $path]);
                
                // กำหนดพาธสำหรับฐานข้อมูล
                $validated['image'] = '/storage/' . $path;
            } catch (\Exception $e) {
                Log::error('Error updating image', ['error' => $e->getMessage()]);
                return back()->withErrors(['image' => 'เกิดข้อผิดพลาดในการอัปเดตรูปภาพ: ' . $e->getMessage()]);
            }
        }

        try {
            $category->update($validated);
            Log::info('Category updated', ['id' => $category->id]);
            
            return redirect()->route('admin.categories.index')
                            ->with('success', 'อัปเดตหมวดหมู่เรียบร้อยแล้ว');
        } catch (\Exception $e) {
            Log::error('Error updating category', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการอัปเดตหมวดหมู่: ' . $e->getMessage()]);
        }
    }

    /**
     * ลบหมวดหมู่ที่ระบุออกจากฐานข้อมูล
     */
    public function destroy(Category $category)
    {
        try {
            // ลบรูปภาพ
            if ($category->image) {
                $imagePath = str_replace('/storage/', '', $category->image);
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    Log::info('Deleted image during category deletion', ['path' => $imagePath]);
                } else {
                    Log::warning('Image not found during category deletion', ['path' => $imagePath]);
                }
            }
            
            $categoryName = $category->name;
            $category->delete();
            Log::info('Category deleted', ['name' => $categoryName]);
            
            return redirect()->route('admin.categories.index')
                            ->with('success', 'ลบหมวดหมู่เรียบร้อยแล้ว');
        } catch (\Exception $e) {
            Log::error('Error deleting category', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการลบหมวดหมู่: ' . $e->getMessage()]);
        }
    }
}