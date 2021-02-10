<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            "semester" => "Semester 1"
        ]);
        Semester::create([
            "semester" => "Semester 2"
        ]);
        Semester::create([
            "semester" => "Semester 3"
        ]);
        Semester::create([
            "semester" => "Semester 4"
        ]);
        Semester::create([
            "semester" => "Semester 5"
        ]);
    }
}
