<?php

namespace Database\Factories;

use App\Models\pembekalan_magang;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class pembekalan_magangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = pembekalan_magang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'test_wpt_iq' =>  $this->faker->randomElement($array = array('sudah', 'belum')),
            'soft_skill' =>  $this->faker->randomElement($array = array('sudah', 'belum')),
            'personality_interview' =>  $this->faker->randomElement($array = array('sudah', 'belum')),
            'file_portofolio' =>  'default.pdf',
            'id_siswa'=> Siswa::factory()
        ];
    }
}
