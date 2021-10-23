<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use App\Models\Periode;
use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kegiatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id_periode" => $this->faker->randomElement(Periode::pluck('id', 'id')->toArray()),
            "nama" => $this->faker->name(),
            "foto" => $this->faker->image(
                $dir=storage_path('app\public\kegiatan'),
                $width = 640,
                $height = 480,
                $category = 'Struktur',
                $fullPath = false,
                $randomize = true,
                $word = null,
                $gray = false
            ),
            "kategori" => $this->faker->randomElement(["laboratorium", "Lomba", "Kerja Praktik", "Studi Tour", "Praktikum"]),
        ];
    }
}
