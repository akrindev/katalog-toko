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
            'name' => $this->faker->title,
            'slug'  => Str::slug($this->faker->title) . time(),
            'description'   => $this->faker->paragraph(5),
            'price' => $this->faker->numberBetween(80000, 220000),
            'size'  => "s,m,l,xl",
            'discount'  => $this->faker->numberBetween(0, 35),
            'stock' => $this->faker->numberBetween(0, 1)
        ];
    }
}
