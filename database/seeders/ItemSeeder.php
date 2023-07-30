<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\AttributeValueItem;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Item attributes
        $status_attribute = Attribute::create(['name' => 'Status','type' => 'select']);
        $bedroom_attribute = Attribute::create(['name' => 'Bedroom','type' => 'select']);
        $m2_attribute = Attribute::create(['name' => 'm2','type' => 'select']);
        $libing_room_attribute = Attribute::create(['name' => 'Living Room','type' => 'select']);
        $en_suite_bathroom_attribute = Attribute::create(['name' => 'En-suit Bathroom','type' => 'select']);
        $pool_attribute = Attribute::create(['name' => 'Pool','type' => 'select']);
        $poolm2_attribute = Attribute::create(['name' => 'Pool m2','type' => 'select']);
        $garden_attribute = Attribute::create(['name' => 'Garden','type' => 'select']);
        $garden_m2_attribute = Attribute::create(['name' => 'Garden m2','type' => 'select']);
        $Furnished_attribute = Attribute::create(['name' => 'Furnished','type' => 'select']);
        $number_of_floor_attribute = Attribute::create(['name' => 'Number of Floor','type' => 'select']);
        $in_the_complex_attribute = Attribute::create(['name' => 'In the Complex','type' => 'select']);
        $heating_attribute = Attribute::create(['name' => 'Heating','type' => 'select']);
        $villa_type = Attribute::create(['name' => 'Villa Type','type' => 'select']);

        $views_attribute = Attribute::create(['name' => 'Views','type' => 'multiselect']);
        $distances_attribute = Attribute::create(['name' => 'Distances','type' => 'multiselect']);
        $features_attribute = Attribute::create(['name' => 'Features','type' => 'multiselect']);

        // categories For Sale, For Rent, For Holiday
        $for_sale_category = ItemCategory::create(['name' => 'For Sale Villas','slug' => 'for-sale']);
        $for_rent_category = ItemCategory::create(['name' => 'For Rent Villas','slug' => 'for-rent']);
        $for_holiday_category = ItemCategory::create(['name' => 'For Holiday Villas','slug' => 'for-holiday']);


        $thumbnail = Media::create([
            'name' => 'default/thumbnail.webp',
            'type' => 'image',
        ]);

        // create item
        $item = Item::create([
            'title' => 'Villa For Sale',
            'slug' => 'villa-for-sale',
            'description' => 'Villa For Sale',
            'price' => 100000,
            'thumbnail_id' => $thumbnail->id,
        ]);

        // create item category
        $item->categories()->attach($for_sale_category->id);

    }
}
