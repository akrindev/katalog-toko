<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug'  => Str::slug($this->faker->name),
            'description'   => $this->faker->text,
            'size'  => $this->faker->randomDigit(),
            'discount'  => $this->faker->numberBetween(5,35),
            'stock' => $this->faker->numberBetween(0,1)
        ];
    }
}
