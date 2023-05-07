<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'superadmin@yopmail.com',
            'password' => \Hash::make('12345678'),
            'phone' => 8084044665,
            'image' => NULL,
            'description' => "This is Super User",
            'user_type' => "Admin",
            'created_at' => now(),
            'updated_at' => now()
        ];
        $user = DB::table('users')->insertGetId($userData);
    }
}
