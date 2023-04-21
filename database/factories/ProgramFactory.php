<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Area;
use App\Models\Employee;
use App\Models\Program;
use App\Models\Shift;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'area_id' => Area::factory(),
            'shift_id' => Shift::factory(),
            'date' => $this->faker->date(),
        ];
    }
}
