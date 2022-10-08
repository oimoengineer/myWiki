<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('USER_NAME'),
            'email' => env('USER_EMAIL'),
            'email_verified_at' => now(),
            'password' => env('USER_PASSWORD'),
            'remember_token' => Str::random(10),
        ]);
    }
}
