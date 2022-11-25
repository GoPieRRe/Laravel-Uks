<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Model\Obat;
use Illuminate\Support\Str;

class ObatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    public $model = Obat::class;

     /**
     * Define the model's default state.
     * 
     * @return array 
     * 
     * 
     */
   

    public function definition()
    {
        return [
            'nama_obat' => $this->faker->name,
            'fungsi' => $this->faker->name,
            'jenis' => $this->faker->name,
            'stok' => $this->faker->numbers,
        ];
    }
}
