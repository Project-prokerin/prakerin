<?php

namespace Database\Factories;

use App\Models\data_prakerin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Base;
use App\Models\guru;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

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
            'id_siswa' => Siswa::factory(),
            'username' => function (array $attributes) {
                return Siswa::find($attributes['id_siswa'])->nipd;
            },
            'role' => $this->faker->randomElement($array = array('siswa')),
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
