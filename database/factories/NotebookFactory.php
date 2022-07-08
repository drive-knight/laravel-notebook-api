<?php

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Notebook::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'date_of_birth' => $this->faker->dateTimeBetween('1980-01-01', '2012-12-31')
        ->format('Y-m-d')
        ];
    }
}
