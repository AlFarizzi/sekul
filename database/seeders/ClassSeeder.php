<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassRoom::insert([
            ["class" => "X RPL"],
            ["class" => "X TKJ"],
            ["class" => "X MM"],
            ["class" => "X AKT"],
            ["class" => "X ADP"],
            ["class" => "XI RPL"],
            ["class" => "XI TKJ"],
            ["class" => "XI MM"],
            ["class" => "XI AKT"],
            ["class" => "XI ADP"],
            ["class" => "XII RPL"],
            ["class" => "XII TKJ"],
            ["class" => "XII MM"],
            ["class" => "XII AKT"],
            ["class" => "XII ADP"],
        ]);
    }
}
