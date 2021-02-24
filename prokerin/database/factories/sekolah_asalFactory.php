<?php

namespace Database\Factories;

use App\Models\sekolah_asal;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class sekolah_asalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = sekolah_asal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_siswa' => Siswa::factory(),
            'no_ijazah'=> 00000,
            'shkun' =>  $this->faker->randomElement($array = array('Sudah','Belum')),
            'asal_sekolah' => $this->faker->randomElement($array = array('SMP Taruna Bhakti', 'SMP AL-Haraki'))
        ];
    }
}
