<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\categoryModel::Create([
            'category_name' =>'Elektronik'
        ]);
        \App\Models\categoryModel::Create([
            'category_name' =>'Non Elektronik'
        ]);
        \App\Models\labParentModel::create([
            'name' => "Lab A - LAB B"
        ]);
        \App\Models\labParentModel::create([
            'name' => "Lab C - LAB D "
        ]);
        \App\Models\labParentModel::create([
            'name' => "Lab E- LAB F"
        ]);
        \App\Models\itemDetailModel::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
