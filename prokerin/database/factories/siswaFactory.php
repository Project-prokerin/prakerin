<?php

namespace Database\Factories;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Base;
use Faker\Provider\en_US\PhoneNumber;
use Carbon\Carbon;
use App\Models\User;
use aker\Provider\DateTime;
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
                'nama_siswa' => $this->faker->name,
                'nipd' => $this->faker->randomNumber(8),
                'jk' =>  $this->faker->randomElement($array = array('L', 'P')),
                'tempat_lahir' => 'depok',
                'tanggal_lahir' => $this->faker->dateTimeBetween(Carbon::now()->format('Y-m-d'),Carbon::now()->addMonth(6)->format('Y-m-d')),
                'nik' => $this->faker->randomNumber(8),
                'agama' =>  $this->faker->randomElement($array = array('islam', 'kristen', 'ateis')),
                'alamat'=> $this->faker->address,
                'jenis_tinggal'=>  $this->faker->randomElement($array = array('rumah', 'ngontrak', 'hotal','pulau')),
                'transportasi'=> $this->faker->randomElement($array = array('rumah', 'ngontrak', 'hotal','pulau')),
                'no_hp' =>  $this->faker->randomNumber(8),
                'email' => $this->faker->email,
                'bb'=> $this->faker->randomNumber(2),
                'tb' => $this->faker->randomNumber(2),
                'anak_ke' => $this->faker->randomNumber(2),
                'jmlh_saudara'=> $this->faker->randomNumber(2),
                'kebutuhan_khusus' => $this->faker->randomElement($array = array('tidak', 'iya')),
                'no_akte' => $this->faker->randomNumber(2)
            ];
    }
}
