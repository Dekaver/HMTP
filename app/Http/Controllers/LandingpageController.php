<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Kalender;
use App\Models\Jadwal;
use App\Models\hmtp;
use App\Models\Kegiatan;
use App\Models\Lab;
use App\Models\Loker;
use App\Models\Perpustakaan;
use App\Models\Periode;
use App\Models\User;
use \Carbon\Carbon;


class LandingpageController extends Controller
{
    public function hmtp()
    {
        $hmtp = hmtp::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->first();
        $Berita = Berita::orderBy("created_at", "DESC")->Paginate('5');
        $kegiatan = Kegiatan::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->get();
        $kategori = kegiatan::select(['kategori'])->groupBy("kategori")->selectRaw('count(*) as total, kategori')->get();
        $agenda = Agenda::where("tanggal" , ">", Carbon::now()->format("Y-m-d"))->paginate(5);
        return view('welcome', compact('hmtp', 'kegiatan', 'kategori','Berita', "agenda"));
        

    }
    public function alumni()
    {
        $alumni = Alumni::all();

        return view('front.alumni.index', compact('alumni'));

    }
    public function loker()
    {
        $loker = loker::paginate('10');

        return view('front.loker.index', compact('loker'));

    }

    public function berita($id)
    {
        $semuaberita = Berita::orderBy("created_at", "DESC")->paginate('5');
        $berita = Berita::findOrFail($id);

        return view("front.berita.index", compact("semuaberita", "berita"));
    }

    public function kalenderAkademik()
    {
        $kalenderAkademik = Kalender::all();
        $fotoJadwal = Kalender::first();
        return view('front.kalenderAkademik.index', compact('kalenderAkademik','fotoJadwal'));

    }

    public function perpustakaan()
    {
        $perpustakaan = Perpustakaan::all();

        return view('front.perpustakaan.index', compact('perpustakaan'));

    }

    public function jadwalKuliah()
    {
        $jadwalKuliah = Jadwal::all();
        $fotoJadwal = Jadwal::first();
        return view('front.jadwalKuliah.index', compact('jadwalKuliah','fotoJadwal'));

    }

    public function laboratorium()
    {
        $laboratorium = Lab::all();

        return view('front.laboratorium.index', compact('laboratorium'));

    }
}
