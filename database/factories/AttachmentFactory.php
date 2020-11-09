<?php

namespace Database\Factories;

use App\Models\Attachment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'file'=>Str::random(100),
            'filename'=>$this->faker->word,
            'size'=>$this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
            'type'=>$this->faker->mimeType,
            'user_id'=>User::factory(),
            'task_id'=>Task::factory(),
        ];
    }
}
