<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {
        $categories = [
            ['name' => 'Science'],
            ['name' => 'Fiction'],
            ['name' => 'History'],
            ['name' => 'Technology'],
            ['name' => 'Biography'],
        ];

        Category::insert($categories);
    }
}
