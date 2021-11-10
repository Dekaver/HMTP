<?php

namespace App\Http\Controllers;
use App\Models\perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index()
    {
        $Perpustakaan = Perpustakaan::all();
        $kategori = Perpustakaan::select("kategori")->groupBy("kategori")->get();
        // dd($kategori);
        return view('admin.Perpustakaan.index', compact('Perpustakaan', 'kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.Perpustakaan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $date = date("dmy");
        $no = Perpustakaan::orderBy("id", "DESC")->pluck('no_panggil')->first();
        $no_baru = $no ? "1".substr("$no",12,3) : "1000";
        $no_panggil = "HMTP-$date-".substr($no_baru+1, 1,3);
        $date = date("his");
        $extension = $request->file('file')->extension();
        $file_name = "ebook_$date.$extension";
        $request->file('file')->storeAs('public/perpustakaan/file', $file_name);

        $extension = $request->file('cover')->extension();
        $cover_name = "cover_ebook_$date.$extension";
        $request->file('cover')->storeAs('public/perpustakaan/cover', $cover_name);

        $Perpustakaan = Perpustakaan::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'no_panggil' => $no_panggil,
            'ringkasan' => $request->ringkasan,
            'file' => $file_name,
            'cover' => $cover_name,
        ]);
        return redirect()->route('Perpustakaan.index')
            ->with('success', 'Perpustakaan Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Perpustakaan = Perpustakaan::where('id', $id)->first();
        return view('admin.Perpustakaan.show', compact('Perpustakaan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Perpustakaan = Perpustakaan::find($id);

        return $Perpustakaan;
    }

    public function update(Request $request, $id)
    {


        $Perpustakaan = Perpustakaan::findOrFail($id);
        $Perpustakaan->kategori = $request->kategori;
        $Perpustakaan->judul = $request->judul;
        $Perpustakaan->penulis = $request->penulis;
        $Perpustakaan->penerbit = $request->penerbit;
        $Perpustakaan->no_panggil = $request->no_panggil;
        $Perpustakaan->ringkasan = $request->ringkasan;
        $Perpustakaan->save();


        return redirect()->route('Perpustakaan.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        Perpustakaan::where('id', $id)->delete();

        return redirect()->route('Perpustakaan.index')
            ->with('delete', 'Perpustakaan Berhasil Dihapus');
    }
}
