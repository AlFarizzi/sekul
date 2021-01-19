<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "admin",
            "nama" => "adminer",
            "role_id" => 1,
            "password" => bcrypt("admin"),
            "alamat" => "bumi",
            "tempat_lahir" => "batam",
            "tanggal_lahir" => "11-27-2002",
            "photo_profile" => "https://source.unsplash.com/random"
        ]);
    }
}
