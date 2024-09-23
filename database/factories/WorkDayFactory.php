<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkDayFactory extends Factory
{
    public function definition():array
    {
        return [
            'lang'=>'cz',
            'day' => 0,
            'workday'=>true
        ];
    }
}