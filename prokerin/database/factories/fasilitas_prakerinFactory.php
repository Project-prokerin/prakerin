<?php

namespace Database\Factories;

use App\Models\fasilitas_prakerin;
use App\Models\jurnal_prakerin;
use Illuminate\Database\Eloquent\Factories\Factory;

class fasilitas_prakerinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = fasilitas_prakerin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_jurnal_prakerin' => jurnal_prakerin::factory(),
            'mess' =>  $this->faker->randomElement($array = array('iya', 'tidak')),
            'buss_antar_jemput' =>  $this->faker->randomElement($array = array('iya', 'tidak')),
            'makan_siang' =>  $this->faker->randomElement($array = array('iya', 'tidak')),
            'intensif' =>  $this->faker->randomElement($array = array('iya', 'tidak')),
        ];
    }
}
