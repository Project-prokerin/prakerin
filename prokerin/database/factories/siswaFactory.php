<?php

namespace Database\Factories;
use App\Models\siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Base;
use Faker\Provider\en_US\PhoneNumber;
use Carbon\Carbon;
use App\Models\User;
class siswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
            return [
                'user_id' => User::factory(),
                'nama'=> function (array $attributes) {
                        return User::find($attributes['user_id'])->name;
                },
                'email' => function (array $attributes) {
                    return User::find($attributes['user_id'])->email;
                },
                'kelas' => $this->faker->randomElement($array = array('XI')),
                'jurusan' => $this->faker->randomElement($array = array('Rekayasa perangkat lunak', 'Multimedia', 'Tehnik Jaringan industru', 'Broatcasting')),
                'nomof_siswa' =>$this->faker->phoneNumber,
                'created_at' => Carbon::now()
            ];
    }
}
