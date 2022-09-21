<?php

namespace Database\Factories;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service_name   = $this->faker->unique()->words($nb = 4, $asText = true);
        $service_slug   = Str::slug($service_name, '-');

        $image_name     = 'service_' . $this->faker->unique()->numberBetween(1, 20) . '.' . 'jpg';

        return [
            'name'                  => $service_name,
            'slug'                  => $service_slug,
            'tagline'               => $this->faker->text(20),
            'service_category_id'   => ServiceCategory::inRandomOrder()->first()->id,
            'price'                 => $this->faker->numberBetween(100, 300),
            'image'                 => $image_name,
            'thumbnail'             => $image_name,
            'description'           => $this->faker->text(200),
            'inclusion'             => $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20),
            'exclusion'             => $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20) . '|' . $this->faker->text(20),
        ];
    }
}