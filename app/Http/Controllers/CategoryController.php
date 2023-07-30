<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = ItemCategory::where('slug', $slug)->firstOrFail();
        $items = $category->items()->simplePaginate(12);
        return view('front.category.show', compact('category', 'items'));
    }
}
