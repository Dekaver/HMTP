<?php

namespace App\Http\Controllers;
use App\Models\kegiatan;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.kegiatan.addkegiatan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_periode' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'kategori' => 'required',
        ]);

        
        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "Kegiatan_$date.$extension";
        $path = $request->file('foto')->storeAs('public/kegiatan', $file_name);

        $kegiatan = Kegiatan::create([
            'id_periode' => $request->id_periode,
            'nama' => $request->nama,
            'foto' => $file_name,
            'kategori' => $request->kategori,
        ]);
        return redirect()->route('kegiatan.index')
            ->with('success', 'kegiatan Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $kegiatans = Kegiatan::where('id', $id)->first();
        return view('kegiatanadmin.kegiatan.show', compact('kegiatan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);

        return $kegiatan;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_periode' => 'required',
            'nama' => 'required',
            'foto' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            'kategori' => 'required',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        if ($request->has("foto")) {

            Storage::delete("public/kegiatan/$kegiatan->struktur_organisasi");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "Kegiatan_$date.$extension";
            $path = $request->file('foto')->storeAs('public/kegiatan', $file_name);
            
            $kegiatan->foto = $file_name;
        }

        $kegiatan->nama = $request->nama;
        $kegiatan->kategori = $request->kategori;
        $kegiatan->id_periode = $request->id_periode;
        $kegiatan->save();

        return redirect()->route('kegiatan.index')
        ->with('edit', 'Kegiatan Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kegiatan::findOrFail($id)->delete();

        return redirect()->route('kegiatan.index')
            ->with('delete', 'kegiatan Berhasil Dihapus');
    }
}
