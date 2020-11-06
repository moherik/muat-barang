<?php

namespace Database\Factories;

use App\Models\PacketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacketTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PacketType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'logo' => $this->faker->imageUrl(),
            'color' => $this->faker->colorName,
            'desc' => $this->faker->text,
        ];
    }
}
