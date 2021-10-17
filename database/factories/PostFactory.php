<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        return [
            'user_id' => Arr::random($user),
            'title' => $this->faker->name(),
            'slug' => $this->faker->userName(),
            'content' => $this->faker->sentence(5500, true),
        ];
    }
}
