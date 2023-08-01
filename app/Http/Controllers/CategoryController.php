<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = ItemCategory::where('slug', $slug)->firstOrFail();

        $items = Item::query();

        $items = $items->whereHas('categories', function ($query) use ($category) {
            $query->where('item_categories.id', $category->id);
        });

        $request_attributes = [];

        foreach (request()->all() as $key => $value) {
            if (str_contains($key, 'attribute_')) {
                $key = explode('attribute_', $key)[1];
                if (!in_array($key, $request_attributes)) {
                    $request_attributes[] = $key;
                }
            }
        }

        $filter_attributes = config('website.filter_attributes');

        $attributes = cache('filter_attributes', function () use ($filter_attributes) {
            return Attribute::with('values')->whereIn('id', collect($filter_attributes)->pluck('id'))->get();
        });

        $attributes = $attributes->keyBy('slug');

        foreach (request()->all() as $key => $value) {
            if (str_contains($key, 'attribute_') && isset($attributes[explode('attribute_', $key)[1]])) {
                $items = $items->whereHas('attributeValues', function ($query) use ($value) {
                    $query->whereIn('attribute_value_id', $value);
                });
            }
        }

        // min_price
        if (request()->has('min_price') && request()->min_price != 0) {
            $items = $items->where('price', '>=', request()->min_price);
        }

        // max_price
        if (request()->has('max_price') && request()->max_price != config('website.max_price')) {
            $items = $items->where('price', '<=', request()->max_price);
        }

        $items = $items->simplePaginate(12);


        return view('front.category.show', compact('category', 'items'));
    }

    function remove_filter_from_url()
    {


        $parameters = request()->get('request_params');
        $attribute_value_id = request()->get('attribute_value_id');

        foreach ($parameters as $key => $parameter) {
            if (str_contains($key, 'attribute_')) {
                foreach ($parameter as $value_key =>  $value_id) {
                    if ($value_id == $attribute_value_id) {
                        unset($parameters[$key][$value_key]);
                    }
                }
            }
        }

        $url = route('front.category.show',request()->get('category_slug')) . '?';

        foreach ($parameters as $key => $parameter) {
            if (str_contains($key, 'attribute_')) {
                foreach ($parameter as $value_key =>  $value_id) {
                    $url .= $key . '[]=' . $value_id . '&';
                }
            } else {
                $url .= $key . '=' . $parameter . '&';
            }
        }

        $url = rtrim($url, '&');

        return response()->json([
            'url' => $url,
            'status' => 'success'
        ]);
    }
}
