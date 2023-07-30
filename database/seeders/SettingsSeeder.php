<?php

namespace Database\Seeders;

use App\Helpers\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::update('site_name', 'Villa Rental System');
    }
}
