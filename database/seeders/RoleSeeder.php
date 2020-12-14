<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            [
                'description' => 'Administrator'
            ],
            [
                'description' => 'Master Dealer'
            ],
            [
                'description' => 'Premium Agent'
            ],
            [
                'description' => 'Agent'
            ],
            [
                'description' => 'Retail - VVIP'
            ],
            [
                'description' => 'Retail - Public'
            ]
        ]);
    }
}
