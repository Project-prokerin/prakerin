<?php

namespace Database\Factories;

use \App\Models\perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Company;
use Faker\Provider\en_US\Address;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
class perusahaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = perusahaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => 'default.png',
            'name' => $this->faker->company,
            'lokasi' => $this->faker->address,
            'nama_petinggi' => $this->faker->name,
            'deskripsi_perusahaan' => $this->faker->text($maxNbChars = 200),
            'tanggal_mou' => $this->daker->date($format = 'Y-m-d', $max = 'now')


        ];
    }
}
