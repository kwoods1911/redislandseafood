<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Khari Woods",
            'email' => 'khariwoods3@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => true,
            'password' => Hash::make('123456789'),
        ]);

        User::factory()->count(3)->create();
    }
}
