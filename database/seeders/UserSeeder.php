<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'                  => 'Kasih Gold HQ',
                'email'                 => 'hq@csc.net.my',
                'email_verified_at'     => now(),
                'password'              => Hash::make('Csc@1234'),
                'avatar'                => 'avatar.png',
                'role'                  => 1,
                'active'                => 1,
                'type'                  => 2,
                'client'                => 1,
                'profile_c'             => 1,
                'created_at'            => now()
            ],
            [
                'name'                  => 'Kasih AP Gold HQ',
                'email'                 => 'hq@kap.net.my',
                'email_verified_at'     => now(),
                'password'              => Hash::make('Csc@1234'),
                'avatar'                => 'avatar.png',
                'role'                  => 1,
                'active'                => 1,
                'type'                  => 2,
                'client'                => 2,
                'profile_c'             => 1,
                'created_at'            => now()
            ]
        ]);
    }
}
