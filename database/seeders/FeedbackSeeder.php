<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\FeedbackCategory;
use App\models\FeedbackSubCategory;
use App\models\FeedbackList;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeedbackCategory::insert([
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'name' => 'Comments'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'name' => 'Suggestions'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'name' => 'Question / Inquiry'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'name' => 'Reports'],
        ]);

        FeedbackSubCategory::insert([
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '1', 'name' => 'Generals'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '1', 'name' => 'a'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '1', 'name' => 'b'],

            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '2', 'name' => 'jfhgv'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '2', 'name' => 'bhjh'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '2', 'name' => 'jhbjhgy'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '2', 'name' => 'uygu'],

            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '3', 'name' => 'kjjh'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '3', 'name' => 'okbbj'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '3', 'name' => 'kjhug'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '3', 'name' => ',jnjb'],

            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '4', 'name' => 'jguygu'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '4', 'name' => 'khihjbj'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '4', 'name' => 'jhbjn'],
            ['created_by' => '1', 'created_at' => date("Y-m-d h:i:sa"), 'category_id' => '4', 'name' => 'guhhl'],
        ]);
    }
}
