<?php

namespace Database\Factories;

use \App\Models\perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Company;
use Faker\Provider\en_US\Address;
use Faker\Provider\Lorem;
use Faker\Provider\DateTime;
use Carbon\Carbon;
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
            'nama' => $this->faker->company,
            'foto' => 'default.jpg',
            'bidang_usaha' => $this->faker->randomElement($array = array('RPL', 'MM', 'TKJ', 'BC')),
            'alamat' => $this->faker->address,
            'link' => $this->faker->url,
            'email' => $this->faker->email,
            'nama_pemimpin' => $this->faker->name,
            'deskripsi_perusahaan' => $this->faker->text(1000),
            'tanggal_mou' =>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status_mou' => $this->faker->randomElement($array = array('7 Tahun', '8  Tahun', '9 Tahun', '10 Tahun')),
            'created_at' => Carbon::now()
        ];
    }
}
