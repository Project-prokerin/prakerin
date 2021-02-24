<?php

namespace Database\Factories;

use App\Models\guru;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\da_DK\Company;

class guruFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = guru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => '111111',
            'nama' => $this->faker->name,
            'jabatan' => $this->faker->randomElement($array = array('kejuruan')),
            'jurusan' =>  $this->faker->randomElement($array = array('RPL', 'MM', 'TKJ','BC')),
            'no_telp'=>$this->faker->phoneNumber
        ];
    }
}
