<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(),
            'user_id'     => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
