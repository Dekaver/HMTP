<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\calender;
use App\Models\Jadwal;
use App\Models\Lab;
use App\Models\Loker;
use App\Models\User;
use App\Models\hmtp;
use App\Models\Perpustakaan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

use App\Models\Periode;

class LandingpageController extends Controller
{
    public function hmtp()
    {
        $hmtp = hmtp::whereId_periode(Periode::whereStatus("1")->pluck("status")->first())->first();

        $kegiatan = Kegiatan::whereId_periode(Periode::whereStatus("1")->pluck("status")->first())->get();

        $kategori = kegiatan::select(['kategori'])->groupBy("kategori")->selectRaw('count(*) as total, kategori')->get();
        return view('welcome', compact('hmtp', 'kegiatan', 'kategori'));

    }
}
