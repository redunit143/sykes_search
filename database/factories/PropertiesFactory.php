<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Properties;

class PropertiesFactory extends Factory
{
    /**
     * The name of the factorys corresponding model.
     *
     * @var string
     */
    protected $model = Properties::class;

    /**
     * Define the models default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_fk_location' => $this->faker->numberBetween(1, 5),
            'property_name' => $this->faker->streetName(),
            'near_beach' => $this->faker->numberBetween(0,1),
            'accepts_pets' => $this->faker->numberBetween(0,1),
            'sleeps' => $this->faker->numberBetween(1, 10),
            'beds' => $this->faker->numberBetween(1, 10),
        ];
    }
}
