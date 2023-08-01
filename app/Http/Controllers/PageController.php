<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug){
        $page = cache()->remember('page_'.$slug, 60, function () use ($slug) {
            return \App\Models\Page::where('slug', $slug)->first();
        });
        return view('front.page.show', compact('page'));
    }

    public function contact(){
        return view('front.page.contact');
    }
}
