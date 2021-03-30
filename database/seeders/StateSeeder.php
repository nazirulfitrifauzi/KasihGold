<?php

namespace Database\Seeders;

use App\Models\States;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        States::insert([
            ['description' => 'JOHOR'],
            ['description' => 'KEDAH'],
            ['description' => 'KELANTAN'],
            ['description' => 'MELAKA'],
            ['description' => 'NEGERI SEMBILAN'],
            ['description' => 'PAHANG'],
            ['description' => 'PULAU PINANG'],
            ['description' => 'PERAK'],
            ['description' => 'PERLIS'],
            ['description' => 'SABAH'],
            ['description' => 'SARAWAK'],
            ['description' => 'SELANGOR'],
            ['description' => 'TERENGGANU'],
        ]);
    }
}
