<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wallpaper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Sodium\add;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
            'password' => 'password',
        ]);

        Wallpaper::factory()->count(20)->afterCreating(
            function (Wallpaper $wallpaper) {
                $count = rand(2, 5);

                Image::factory()
                    ->count($count)
                    ->sequence(
                        ...collect(range(0, $count - 1))
                        ->map(fn ($i) => ['position' => $i])
                        ->toArray()
                    )
                    ->for($wallpaper)
                    ->create();
            }
        )->create();
    }
}
