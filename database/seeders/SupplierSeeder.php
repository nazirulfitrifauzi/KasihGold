<?php

namespace Database\Seeders;

use App\Models\InvSupplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvSupplier::insert([
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'code' => '000001', 'name' => 'SUPPLIER A'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'code' => '000002', 'name' => 'SUPPLIER B'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'code' => '000003', 'name' => 'SUPPLIER C'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'code' => '000004', 'name' => 'SUPPLIER D'],
        ]);
    }
}
