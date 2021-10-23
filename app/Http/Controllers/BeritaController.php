<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        abort(404);
        return view('admin.berita.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'isi' => 'required',
        ]);
        //save file
        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "foto_$date.$extension";
        $path = $request->file('foto')->storeAs('public/berita', $file_name);
        //end save file
        $berita = Berita::create([
            'judul' => $request->judul,
            'foto' => $file_name,
            'isi' => $request->isi,
        ]);
        return redirect()->route('berita.index')
            ->with('success', 'berita Berhasil Ditambahkan');
    }

    public function show($id)
    {
        abort(404);
        $berita = Berita::where('id', $id)->first();
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
            'judul' => 'required',
            'foto' => 'file|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'isi' => 'required',
        ]);
        $berita = Berita::findOrFail($id);

        if ($request->has("foto")) {

            Storage::delete("public/berita/$berita->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "foto_$date.$extension";
            $path = $request->file('foto')->storeAs('public/berita', $file_name);
            
            $berita->foto = $file_name;
        }

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;

        $berita->save();

        return redirect()->route('berita.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::delete("public/berita/$berita->foto");
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('delete', 'berita Berhasil Dihapus');
    }
}
