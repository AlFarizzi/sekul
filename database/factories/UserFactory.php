<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           "username" => $this->faker->userName,
           "nama" => $this->faker->name,
           "role_id" => 4,
           "password" => bcrypt("murid"),
           "alamat" => $this->faker->address,
           "tempat_lahir" => $this->faker->city,
           "tanggal_lahir" => "27-11-2002",
           "photo_profile" => "https://source.unsplash.com/random"
        ];
    }
}
