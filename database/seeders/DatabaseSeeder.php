<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingsSeeder::class,
            UserSeeder::class,
            ItemSeeder::class,
            SliderSeeder::class,
            PageSeeder::class,
        ]);
    }
}
