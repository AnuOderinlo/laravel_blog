<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Faker\Factory as FakerFactory;
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
        return [
            //
            'user_id'=>User::factory(),
            'category_id'=>$this->faker->randomDigit,
            // 'category_id'=> 1,
            'title'=>$this->faker->sentence,
            'post_image'=>$this->faker->imageUrl(650, 350),
            'body'=>$this->faker->paragraph
        ];
    }
}
