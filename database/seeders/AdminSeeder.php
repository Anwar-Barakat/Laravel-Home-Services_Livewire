<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name'              => 'Anwar Barakat',
            'email'             => 'brkatanwar0@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('adminadmin'),
            'remember_token'    => Str::random(10),
            'uType'             => 'admin',
            'phone'             => '0123456789',
        ];

        if (is_null(User::where(['email' => 'brkatanwar0@gmail.com'])->first()))
            User::create($admin);
    }
}