<?php

namespace Database\Factories;

use App\Models\jurnal_harian;
use App\Models\perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Siswa;
use Carbon\Carbon;
class jurnal_harianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = jurnal_harian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'tanggal'=>  $this->faker->dateTimeBetween(Carbon::now()->format('Y-m-d'), Carbon::now()->addMonth(6)->format('Y-m-d')),
                'datang' => $this->faker->dateTimeBetween($startDate = '7:00:00', $endDate = '8:00:00'),
                'pulang' => $this->faker->dateTimeBetween($startDate = '12:00:00', $endDate = '15:00:00'),
                'kegiatan_harian' => $this->faker->text($maxNbChars = 100),
                'id_siswa' => Siswa::factory(),
                'id_perusahaan' => perusahaan::factory(),
        ];
    }
}
