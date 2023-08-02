<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\SliderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    function index(){
        $slider_slides = cache()->remember('slider_slides', 60, function () {
            return SliderItem::with('desktop','mobile')->where('slider_id',1)->orderBy('order','ASC')->get();
        });
        $for_sale_items = cache()->remember('for_sale_items', 60, function () {
            return Item::with('thumbnail')->whereHas('categories',function ($query){
                $query->where('category_id',1);
            })->orderBy('id','desc')->limit(4)->get();
        });
        $for_rent_items = cache()->remember('for_rent_items', 60, function () {
            return Item::with('thumbnail')->whereHas('categories',function ($query){
                $query->where('category_id',2);
            })->orderBy('id','desc')->limit(4)->get();
        });
        $for_holiday_items = cache()->remember('for_holiday_items', 60, function () {
            return Item::with('thumbnail')->whereHas('categories',function ($query){
                $query->where('category_id',3);
            })->orderBy('id','desc')->limit(4)->get();
        });
        $categories = cache()->remember('categories', 60, function () {
            return ItemCategory::whereIn('id',[1,2,3])->orderBy('id','ASC')->get();
        });

        return view('home',compact('slider_slides','for_sale_items','for_rent_items','for_holiday_items','categories'));
    }

    function artisan(){
        Artisan::call('config:cache');
    }
}
