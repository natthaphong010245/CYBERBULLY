<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Infographic;
use Illuminate\Http\Request;

class InfographicControllers extends Controller
{
    public function main()
    {
        $categories = Category::all();
        return view('inforgraphic.main', compact('categories'));
    }

    public function category($categoryId)
    {
        $category = Category::with('activeInfographics')->findOrFail($categoryId);
        
        return view('inforgraphic.category', [
            'categoryId' => $categoryId,
            'categoryName' => $category->name,
            'items' => $category->activeInfographics
        ]);
    }

    public function detail($id)
    {
        $item = Infographic::findOrFail($id);
        
        // Get previous and next items in the same category
        $prevItem = $item->getPrevious();
        $nextItem = $item->getNext();
        
        return view('inforgraphic.detail', [
            'item' => $item,
            'prevItem' => $prevItem,
            'nextItem' => $nextItem
        ]);
    }
}