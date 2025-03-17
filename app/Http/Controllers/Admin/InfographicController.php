<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Infographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InfographicController extends Controller
{
    /**
     * Display a listing of infographics.
     */
    public function index()
    {
        $infographics = Infographic::with('category')->orderBy('categories_infographics_id')->orderBy('order')->get();
        return view('admin.infographics.index', compact('infographics'));
    }

    /**
     * Show the form for creating a new infographic.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.infographics.create', compact('categories'));
    }

    /**
     * Store a newly created infographic in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'categories_infographics_id' => 'required|exists:categories_infographics,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            try {
                // บันทึกข้อมูลเกี่ยวกับไฟล์
                Log::info('Uploading file', [
                    'originalName' => $request->file('image')->getClientOriginalName(),
                    'size' => $request->file('image')->getSize(),
                    'mimeType' => $request->file('image')->getMimeType()
                ]);
                
                // ใช้ store กับ disk 'public' แทนการใช้ prefix 'public/'
                $path = $request->file('image')->store('infographics', 'public');
                
                // บันทึกข้อมูลเกี่ยวกับพาธที่บันทึก
                Log::info('Stored path', ['path' => $path]);
                
                // สร้าง URL ที่ถูกต้อง
                $validated['image'] = '/storage/' . $path;
                
                Log::info('Image URL saved to database', ['url' => $validated['image']]);
            } catch (\Exception $e) {
                Log::error('Error uploading file', ['error' => $e->getMessage()]);
                return back()->withErrors(['image' => 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ: ' . $e->getMessage()]);
            }
        }

        try {
            $infographic = Infographic::create($validated);
            Log::info('Infographic created', ['id' => $infographic->id, 'title' => $infographic->title]);
            
            return redirect()->route('admin.infographics.index')
                             ->with('success', 'Infographic created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating infographic', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการสร้าง Infographic: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified infographic.
     */
    public function edit(Infographic $infographic)
    {
        $categories = Category::all();
        return view('admin.infographics.edit', compact('infographic', 'categories'));
    }

    /**
     * Update the specified infographic in storage.
     */
    public function update(Request $request, Infographic $infographic)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'categories_infographics_id' => 'required|exists:categories_infographics,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            try {
                // บันทึกข้อมูลเกี่ยวกับไฟล์
                Log::info('Updating image for infographic', [
                    'infographic_id' => $infographic->id,
                    'originalName' => $request->file('image')->getClientOriginalName()
                ]);
                
                // ลบรูปภาพเก่า
                if ($infographic->image) {
                    $oldPath = str_replace('/storage/', '', $infographic->image);
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                        Log::info('Deleted old image', ['path' => $oldPath]);
                    } else {
                        Log::warning('Old image not found for deletion', ['path' => $oldPath]);
                    }
                }
                
                // บันทึกรูปภาพใหม่
                $path = $request->file('image')->store('infographics', 'public');
                
                // บันทึกข้อมูลเกี่ยวกับพาธที่บันทึก
                Log::info('New image stored', ['path' => $path]);
                
                // สร้าง URL ที่ถูกต้อง
                $validated['image'] = '/storage/' . $path;
                
                Log::info('New image URL saved to database', ['url' => $validated['image']]);
            } catch (\Exception $e) {
                Log::error('Error updating image', ['error' => $e->getMessage()]);
                return back()->withErrors(['image' => 'เกิดข้อผิดพลาดในการอัปเดตรูปภาพ: ' . $e->getMessage()]);
            }
        }

        try {
            $infographic->update($validated);
            Log::info('Infographic updated', ['id' => $infographic->id]);
            
            return redirect()->route('admin.infographics.index')
                             ->with('success', 'Infographic updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating infographic', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการอัปเดต Infographic: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified infographic from storage.
     */
    public function destroy(Infographic $infographic)
    {
        try {
            // ลบรูปภาพ
            if ($infographic->image) {
                $imagePath = str_replace('/storage/', '', $infographic->image);
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    Log::info('Deleted image during infographic deletion', ['path' => $imagePath]);
                } else {
                    Log::warning('Image not found during infographic deletion', ['path' => $imagePath]);
                }
            }
            
            $title = $infographic->title;
            $infographic->delete();
            Log::info('Infographic deleted', ['title' => $title]);
            
            return redirect()->route('admin.infographics.index')
                             ->with('success', 'Infographic deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting infographic', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'เกิดข้อผิดพลาดในการลบ Infographic: ' . $e->getMessage()]);
        }
    }
}