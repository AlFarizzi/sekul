<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            "mapel" => "MTK"
        ]);
        Subject::create([
            "mapel" => "AGAMA"
        ]);
        Subject::create([
            "mapel" => "PKN"
        ]);
        Subject::create([
            "mapel" => "PWPB"
        ]);
        Subject::create([
            "mapel" => "PBO"
        ]);
        Subject::create([
            "mapel" => "BASIS DATA"
        ]);
    }
}
