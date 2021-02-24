<?php

namespace Database\Factories;

use App\Models\data_prakerin;
use App\Models\guru;
use App\Models\perusahaan;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
class data_prakerinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = data_prakerin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_siswa'=>Siswa::factory(),
            'nama'=> function (array $attributes) {
                return Siswa::find($attributes['id_siswa'])->nama_siswa;
            },
            'jurusan' =>  $this->faker->randomElement($array = array('Rekaya Perangkat Lunak', 'Multimedia','Broatcasting','Tehnik jaringan')),
            'kelas' => 'XII',
            'id_perusahaan' => perusahaan::factory(),
            'id_guru'=> guru::factory(),
            'tgl_mulai' => $this->faker->dateTimeBetween($startDate = '-2 month', $endDate = 'now'),
            'tgl_selesai' => $this->faker->dateTimeBetween(Carbon::now()->addMonth(4)->format('Y-m-d'), Carbon::now()->addMonth(6)->format('Y-m-d')),
        ];
    }
}
