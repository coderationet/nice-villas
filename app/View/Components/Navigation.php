<?php

namespace App\View\Components;

use App\Models\ItemCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = cache()->remember('all_categories', 60, function () {
            return ItemCategory::orderBy('name', 'asc')->get();
        });

        return view('components.navigation', compact('categories'));
    }
}
