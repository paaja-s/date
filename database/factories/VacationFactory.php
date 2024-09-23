<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    public function definition():array
    {
        return [
            'lang'=>'cz',
            'date' => '05-01',
            'name'=>'1. maj'
        ];
    }
}