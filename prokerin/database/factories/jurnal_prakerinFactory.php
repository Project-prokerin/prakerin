<?php

namespace Database\Factories;

use App\Models\jurnal_prakerin;
use App\Models\perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Siswa;
class jurnal_prakerinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = jurnal_prakerin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kompetisi_dasar'=>  $this->faker->text($maxNbChars = 100),
            'topik_pekerjaan'=> $this->faker->randomElement($array = array('Membuat web perusahaan', 'Membuat desain perusahaan')),
            'tanggal_pelaksanaan' =>  $this->faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(6)->format('Y-m-d')),
            'jam_masuk' => $this->faker->dateTimeBetween($startDate = '7:00:00', $endDate = '8:00:00'),
            'jam_istirahat' => $this->faker->dateTimeBetween($startDate = '9:00:00', $endDate = '10:00:00'),
            'jam_pulang' =>  $this->faker->dateTimeBetween($startDate = '12:00:00', $endDate = '15:00:00'),
            'id_perusahaan' => perusahaan::factory(),
            'id_siswa'=> Siswa::factory()
        ];
    }
}
