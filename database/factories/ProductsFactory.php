<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;

class ProductsFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word() . ' ' . $this->faker->word(),
            'category_id' => $this->faker->biasedNumberBetween(1, 2),
            'description' => substr($this->faker->sentence(), 0, 200)
        ];
    }
}
