<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Wallpaper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallpaper>
 */
class WallpaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->streetName(),
            "is_public" => $this->faker->boolean(),
            "download_count" => $this->faker->numberBetween(0, 100),
            "creator_id" => User::factory(),
        ];
    }
    protected $model = Wallpaper::class;
}
