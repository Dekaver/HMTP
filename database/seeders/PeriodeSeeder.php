<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periode::create([
            'tahun' => "2020-2021",
            'semester' => "ganjil",
            'status' => "0",
        ]);
        Periode::create([
            'tahun' => "2020-2021",
            'semester' => "genap",
            'status' => "0",
        ]);
        Periode::create([
            'tahun' => "2021-2022",
            'semester' => "ganjil",
            'status' => "1",
        ]);
    }
}
