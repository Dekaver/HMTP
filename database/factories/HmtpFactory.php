<?php

namespace Database\Factories;

use App\Models\Hmtp;
use App\Models\Periode;
use Illuminate\Database\Eloquent\Factories\Factory;

class HmtpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hmtp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_periode" =>  $this->faker->randomElement(Periode::pluck('id', 'id')->toArray(), $allowDuplicates = true),
            "deskripsi" =>  $this->faker->sentences($nb = 10, $asText = true),
            "visi" =>  $this->faker->sentences($nb = 5, $asText = true),
            "misi" =>  $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            "struktur_organisasi" =>  $this->faker->image(
                $dir=storage_path('app\public\struktur-organisasi'),
                $width = 640,
                $height = 480,
                $category = 'Struktur',
                $fullPath = false,
                $randomize = true,
                $word = null,
                $gray = false
            ),
        ];
    }
}
