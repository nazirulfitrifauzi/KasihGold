<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            ['name'=>'Maybank'],
            ['name'=>'CIMB'],
            ['name'=>'Affin Bank'],
            ['name'=>'RHB'],
            ['name'=>'Hong Leong Bank'],
            ['name'=>'HSBC Bank'],
            ['name'=>'AmBank'],
            ['name'=>'Standard Chartered Bank'],
            ['name'=>'Public Bank'],
            ['name'=>'Alliance Bank'],
            ['name'=>'Agro Bank'],
            ['name'=>'Bank Muamalat'],
            ['name'=>'UOB'],
            ['name'=>'OCBC Bank'],
            ['name'=>'Exim Bank'],
        ]);
    }
}
