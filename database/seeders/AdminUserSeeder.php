<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            
            [
                'name' => 'Super Admin',
                'email' => 'admin@auction.com',
                'password' => Hash::make('password123'),
                'phone' => '00000000000',
                'user_type' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // User 1
            [
                'name' => 'User 1',
                'email' => 'User1@example.com',
                'password' => Hash::make('user12345'),
                'phone' => '11111111111',
                'user_type' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // User 2
            [
                'name' => 'User 2',
                'email' => 'User2@example.com',
                'password' => Hash::make('user12345'),
                'phone' => '22222222222',
                'user_type' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
