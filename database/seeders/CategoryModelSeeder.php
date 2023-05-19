<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\categoryModel::Create([
            'category_name' =>'Elektronik'
        ]);
        \App\Models\categoryModel::Create([
            'category_name' =>'Non Elektronik'
        ]);
    }
}
