<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3), // alteração feita aqui
            'description' => $this->faker->paragraph(3),
            'due_date' => now()->addDays($this->faker->numberBetween(1, 30)),
            'completed' => false,
        ];
    }
}
