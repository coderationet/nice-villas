<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@websiteaddress.com';
        $user->password = bcrypt('password');
        $user->save();

        # create role admin
        $role = Role::create(['name' => 'admin']);

        # assign role admin to user
        $user->assignRole($role);
    }
}
