<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\GroupTask;
use App\Models\Shift;
use App\Models\Task;

class GroupTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'task_id' => Task::factory(),
            'shift_id' => Shift::factory(),
            'color' => $this->faker->word,
        ];
    }
}
