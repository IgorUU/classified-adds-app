<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $parent_categories = Category::factory()->count(5)->create();
        foreach ($parent_categories as $parent_category) {
            Category::factory()->count(2)->create(
                [
                    'parent_id' => $parent_category->id,
                ]
            );
        }

        Ad::factory(50)->create();
    }
}
