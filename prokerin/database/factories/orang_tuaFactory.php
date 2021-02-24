<?php

namespace Database\Factories;

use App\Models\orang_tua;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Siswa;
use Carbon\Carbon;
class orang_tuaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = orang_tua::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_siswa' => Siswa::factory(),
            'nomor_kk' => $this->faker->randomDigitNotNull(10),
            'nama_ayah' => $this->faker->name,
            'tl_ayah' =>  $this->faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(12)->format('Y-m-d')),
            'pendidikan_ayah' =>  $this->faker->randomElement($array = array('SD', 'SMP', 'SMA', 'S1','S2')),
            'pekerjaan_ayah' => $this->faker->randomElement($array = array('Kariawan', 'Manageer','CEO','SEO')),
            'penghasilan_ayah' =>  $this->faker->randomElement($array = array('Rp 20,000.000', 'Rp 40,000.000', 'Rp 80,000.000', 'Rp 100,000.000')),
            'nik_ayah' => $this->faker->randomNumber(8),
            'nama_ibu' => $this->faker->name,
            'tl_ibu' =>  $this->faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(12)->format('Y-m-d')),
            'pendidikan_ibu' =>  $this->faker->randomElement($array = array('SD', 'SMP', 'SMA', 'S1', 'S2')),
            'pekerjaan_ibu' => $this->faker->randomElement($array = array('Kariawan', 'Manageer', 'CEO', 'SEO')),
            'penghasilan_ibu' =>  $this->faker->randomElement($array = array('Rp 20,000.000', 'Rp 40,000.000', 'Rp 80,000.000', 'Rp 100,000.000')),
            'nik_ibu' => $this->faker->randomNumber(8),
            'pekerjaan_ibu' => $this->faker->randomElement($array = array('kandung','haram','pungut','angkat')),
        ];
    }
}
