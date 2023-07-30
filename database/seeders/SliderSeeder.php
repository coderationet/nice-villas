<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $media_desktop  = Media::create([
            "name" => "default/slider-1.png",
            "type" => "image",
        ]);

        $media_mobile = Media::create([
            "name" => "default/slider-2.png",
            "type" => "image",
        ]);

        $slider = Slider::create([
            "name" => "Home Slider",
        ]);

        $slider->sliderImages()->create([
            "title" => "Home Slider",
            "sub_title" => "Home Slider",
            "file_desktop" => $media_desktop->id,
            "file_mobile" => $media_mobile->id,
            "link" => "/",
            "link_text" => "Home Slider",
        ]);
    }
}
