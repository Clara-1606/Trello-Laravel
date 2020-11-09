<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Category;
use App\Models\Task;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $d=new DateTime('+ 7 days');
        return [
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->paragraph,
            'due_date'=> $d->format("Y-m-d"),
            'state'=>$this->faker->randomElement($array = array ('todo','ongoing','done')),
            'category_id'=>Category::factory(),
            'board_id'=> Board::factory(),

            //
        ];
    }
}
