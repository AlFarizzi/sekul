<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nisn" => rand(1000000,5000000),
            "nis" => rand(1000000,5000000),
            "tahun_masuk" => rand(2015,2018),
            "tahun_tamat" => rand(2018,2021),
            "user_id" => rand(2,301),
            "class_id" =>rand(1,15)
        ];
    }
}
