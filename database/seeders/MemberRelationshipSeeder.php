<?php

namespace Database\Seeders;

use App\Models\MemberRelationship;
use Illuminate\Database\Seeder;

class MemberRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberRelationship::insert([
            [
                'description' => 'Pasangan'
            ],
            [
                'description' => 'Ibubapa'
            ],
            [
                'description' => 'Penjaga'
            ],
            [
                'description' => 'Anak'
            ],
            [
                'description' => 'Adik'
            ],
            [
                'description' => 'Kakak'
            ],
            [
                'description' => 'Abang'
            ],
        ]);
    }
}
