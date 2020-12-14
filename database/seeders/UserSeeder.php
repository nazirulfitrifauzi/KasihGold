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
                'created_at'            => now()
            ],
            [
                'name'                  => 'Agent Kasih Gold',
                'email'                 => 'agent@csc.net.my',
                'email_verified_at'     => now(),
                'password'              => Hash::make('Csc@1234'),
                'avatar'                => 'avatar.png',
                'role'                  => 2,
                'active'                => 1,
                'created_at'            => now()
            ]
        ]);
    }
}
