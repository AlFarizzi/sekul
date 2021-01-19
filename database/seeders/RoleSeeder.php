<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "role" => "admin"
        ]);
        Role::create([
            "role" => "guru"
        ]);
        Role::create([
            "role" => "keuangan"
        ]);
        Role::create([
            "role" => "murid"
        ]);
    }
}
