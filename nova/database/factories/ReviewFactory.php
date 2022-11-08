<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        $worker = User::factory(["worker" => true])->create();

        return [
            "user_id" => $user->id,
            "worker_id" => $worker->id,
            "description" => $this->faker->paragraph,
            "score" => rand(0, 5)
        ];
    }
}
