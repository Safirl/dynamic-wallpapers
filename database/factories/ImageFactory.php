<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Wallpaper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->randomElement([
                "/images/test-image-1.jpg",
                "/images/test-image-2.jpg",
                "/images/test-image-3.jpg",
                "/images/test-image-4.jpg",
                "/images/test-image-5.jpg",
                "/images/test-image-6.jpg",
                "/images/test-image-7.jpg",
            ]),
            'wallpaper_id' => Wallpaper::factory(),
            'position' => $this->faker->numberBetween(0, 2),
            'duration' => $this->faker->numberBetween(1, 30),
            'transition_duration' => $this->faker->numberBetween(0, 10),
        ];
    }
    protected $model = Image::class;
}
