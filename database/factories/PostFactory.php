<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* 
        Generate fake data
            1. Use tinker  (run in the terminal)
                * php artisan tinker
            2. Setup definition in the model factory e.g PostFactory.php like this one down here
            2. Then reference yr Model, in this case-- post model
                * App\Models\Post::factory()->times(200)->create('user_id' => 15);

        */
        return [
            'body' => $this->faker->sentence(40),
        ];
    }
}
