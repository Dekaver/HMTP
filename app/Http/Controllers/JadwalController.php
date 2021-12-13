<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.jadwal.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'foto' => 'required',
            'id_periode' => 'required',
        ]);
        //save foto
        $date = date("his");
        $extension = $request->file('foto')->extension();
        $file_name = "foto_$date.$extension";
        $path = $request->file('foto')->storeAs('public/jadwal', $file_name);
        //end save foto
        $jadwal = Jadwal::create([
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
            'id_periode' => $request->id_periode,
        ]);
        return redirect()->route('jadwal.index')
            ->with('success', 'jadwal Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $jadwals = Jadwal::where('id', $id)->first();
        return view('jadwal.show', compact('jadwal'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return $jadwal;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'foto' => 'nullable|image',
            'id_periode' => 'required',
        ]);

        $jadwal = Jadwal::find($id);
        if ($request->filled("foto")) {

            Storage::delete("public/jadwal/$jadwal->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "foto_$date.$extension";
            $path = $request->file('foto')->storeAs('public/jadwal', $file_name);
            
            $jadwal->foto = $file_name;
        }


        $jadwal->deskripsi = $request->get('deskripsi');
        $jadwal->id_periode = $request->get('id_periode');

        $jadwal->save();


        return redirect()->route('jadwal.index')
        ->with('edit', 'jadwal Berhasil Diedit');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        Storage::delete("public/jadwal/$jadwal->foto");
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('delete', 'jadwal Berhasil Dihapus');
    }
}
