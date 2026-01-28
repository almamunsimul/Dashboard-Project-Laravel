<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

        Role::truncate();
        Role::create([
            'role_name' =>'Super Admin',
        ]);        
        Role::create([
            'role_name' =>'Admin',
        ]);        
        Role::create([
            'role_name' =>'Manager',
        ]);        
        Role::create([
            'role_name' =>'Editor',
        ]);        
        Role::create([
            'role_name' =>'Subscriber',
        ]);
    }
}
