<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tution>
 */
class TutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'title'=>fake()->name,
            'user_id'=>3,
            'category_id' => rand(1,5),
            'class_type_id'=> rand(1,5),
            'no_of_stu'=> rand(1,4),
            'salary'=> rand(3000,10000),
            'location'=> fake()->city,
            'description'=>fake()->text,
            'responsibility'=> fake()->text,
            'qualifications'=> fake()->text,
            'experience'=> rand(1,5),
            'gurdian_name'=> fake()->name,
            'gurdian_number'=>fake()->text
            //
        ];
    }
}
