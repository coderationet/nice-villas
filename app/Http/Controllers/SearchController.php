<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $category_url = route('front.category.show', $request->category_slug);
        $location_id = $request->location_id;

        $category_url = $category_url . '?attribute_location[]=' . $location_id;

        return redirect($category_url);
    }
}
