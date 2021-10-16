<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy("created_at")->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.addberita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'id_periode' => 'required',
            'struktur_organisasi' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'visi' => 'required',
            'misi' => 'required',
        ]);
        //save file
        $date = date("his");
        $extension = $request->file('struktur_organisasi')->extension();
        $file_name = "Struktur_organisasi_$date.$extension";
        $path = $request->file('struktur_organisasi')->storeAs('public/struktur-organisasi', $file_name);
        //end save file
        $berita = Berita::create([
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'struktur_organisasi' => $file_name,
            'id_periode' => $request->id_periode,
        ]);
        return redirect()->route('berita.index')
            ->with('success', 'berita Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $beritas = Berita::where('id', $id)->first();
        return view('beritaadmin.berita.show', compact('berita'));
    }


    public function edit($id)
    {
        $berita = Berita::find($id);

        return $berita;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'id_periode' => 'required',
            'struktur_organisasi' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            'visi' => 'required',
            'misi' => 'required',
        ]);
        $berita = Berita::findOrFail($id);

        if ($request->has("struktur_organisasi")) {

            Storage::delete("public/struktur-organisasi/$berita->struktur_organisasi");

            $date = date("his");
            $extension = $request->file('struktur_organisasi')->extension();
            $file_name = "Struktur_organisasi_$date.$extension";
            $path = $request->file('struktur_organisasi')->storeAs('public/struktur-organisasi', $file_name);
            
            $berita->struktur_organisasi = $file_name;
        }

        $berita->deskripsi = $request->deskripsi;
        $berita->visi = $request->visi;
        $berita->misi = $request->misi;
        $berita->id_periode = $request->id_periode;

        $berita->save();

        return redirect()->route('berita.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::delete("public/struktur-organisasi/$berita->struktur_organisasi");
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('delete', 'berita Berhasil Dihapus');
    }
}
