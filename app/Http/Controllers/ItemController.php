<?php

namespace App\Http\Controllers;

use App\Helpers\AttributeHelper;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(String $slug){
        $item = Item::where('slug', $slug)->firstOrFail();
        $attributes = AttributeHelper::itemAttributes($item);
        return view('front.item.show', [
            'item' => $item,
            'attributes' => $attributes,
        ]);
    }
}
