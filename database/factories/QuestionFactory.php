<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id' => $this->faker->randomDigit(),
            'category' => 'technical',
            'title' => $this->faker->sentence(),
            'option_1' => $this->faker->sentence(),
            'option_2' => $this->faker->sentence(),
            'option_3' => $this->faker->sentence(),
            'option_4' => $this->faker->sentence(),
        ];
    }
}
