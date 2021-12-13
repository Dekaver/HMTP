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
use DB;


class LandingpageController extends Controller
{
    public function hmtp()
    {
        $hmtp = hmtp::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->first();
        $Berita = Berita::orderBy("created_at", "DESC")->Paginate('5');
        $kegiatan = Kegiatan::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->get();
        $kategori = kegiatan::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->select(['kategori'])->groupBy("kategori")->selectRaw('count(*) as total, kategori')->get();
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
        $loker = loker::where("status", '1')->paginate('8');

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
        $kalenderAkademik = Kalender::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->first();
        return view('front.kalenderAkademik.index', compact('kalenderAkademik'));

    }

    public function perpustakaan()
    {
        $perpustakaan = Perpustakaan::all();
        $kategori = Perpustakaan::select("kategori", Perpustakaan::raw("COUNT(kategori) as total"))->groupBy("kategori")->get();

        return view('front.perpustakaan.index', compact('perpustakaan', 'kategori'));
    }
    
    public function cariBuku(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);
        $perpustakaan = Perpustakaan::where("judul", "LIKE", "%$request->q%")
            ->orWhere("judul", "LIKE", "%$request->q%")
            ->orWhere("penerbit", "LIKE", "%$request->q%")
            ->orWhere("penulis", "LIKE", "%$request->q%")
            ->orWhere("no_panggil", "LIKE", "%$request->q%")
            ->get();
        $kategori = Perpustakaan::select("kategori", Perpustakaan::raw("COUNT(kategori) as total"))->groupBy("kategori")->get();
        $q = $request->q;
        return view('front.perpustakaan.index', compact('perpustakaan', 'kategori', 'q'));
    }
    
    public function cariKategoriBuku($kategori)
    {
        $perpustakaan = Perpustakaan::where("kategori", "LIKE", "%$kategori%")->get();
        $total = Perpustakaan::count();
        $kategori = Perpustakaan::select("kategori", Perpustakaan::raw("COUNT(kategori) as total"))->groupBy("kategori")->get();
        $k = $kategori;
        return view('front.perpustakaan.index', compact('perpustakaan', 'kategori', 'k', 'total'));
    }

    public function getDataBuku($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return $perpustakaan;
    }

    public function jadwalKuliah()
    {
        $jadwalkuliah = Jadwal::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->first();
        // $fotoJadwal = Jadwal::first();
        return view('front.jadwalKuliah.index', compact('jadwalkuliah'));

    }

    public function laboratorium()
    {
        $laboratorium = Lab::whereId_periode(Periode::whereStatus("1")->pluck("id")->first())->get();
    
        return view('front.laboratorium.index', compact('laboratorium'));

    }

    public function bacaBuku($no)
    {
        $perpustakaan = Perpustakaan::orderBy("id", "DESC")->paginate(5);
        $buku = Perpustakaan::where("no_panggil", $no)->first();
        return view('front.perpustakaan.show', compact('buku', 'perpustakaan'));

    }
}
