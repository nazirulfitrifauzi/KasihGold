<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SanctionSeeder::class,
            FeedbackSeeder::class,
            SupplierSeeder::class,
            RoleSeeder::class,
            MemberRelationshipSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
