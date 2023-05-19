<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\itemDetailModel>
 */
class ItemDetailModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => fake()->sentence(1),
            'description' => fake()->sentence(3),
            'condition' => fake()->sentence(4),
            'location' => 'Ruangan A',
            'is_already' => mt_rand(0,1),
            'user_id' => mt_rand(1,6),
            'category_id' => mt_rand(1,2)
        ];
    }
}
