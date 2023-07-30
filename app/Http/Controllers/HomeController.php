<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SliderItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $slider_slides = cache()->remember('slider_slides', 60, function () {
            return SliderItem::with('desktop','mobile')->where('slider_id',1)->orderBy('order','ASC')->get();
        });
        return view('home',compact('slider_slides'));
    }
}
