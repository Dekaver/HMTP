<?php

namespace App\Http\Controllers;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $Lab = Lab::all();
        return view('admin.Lab.index', compact('Lab'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.Lab.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nama' => 'required',
            'kepala_lab' => 'required',
            'asisten_lab' => 'required',
            'kegiatan' => 'required',
            'id_periode' => 'required',
        ]);
        $Lab = Lab::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kegiatan' => $request->kegiatan,
            'kepala_lab' => $request->kepala_lab,
            'asisten_lab' => implode(";",$request->asisten_lab),
            'id_periode' => $request->id_periode,
        ]);
        return redirect()->route('Lab.index')
            ->with('success', 'Lab Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Labs = Lab::where('id', $id)->first();
        return view('admin.Lab.show', compact('Lab'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit($id)
    {
        $Lab = Lab::find($id);

        return $Lab;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'kepala_lab' => 'required',
            'nama' => 'required',
            'asisten_lab' => 'required',
            'id_periode' => 'required',
            'kegiatan' => 'required',
        ]);

        $Lab = Lab::findorfail($id);
        $Lab->nama = $request->nama;
        $Lab->deskripsi = $request->deskripsi;
        $Lab->kegiatan = $request->kegiatan;
        $Lab->kepala_lab = $request->kepala_lab;
        $Lab->asisten_lab = implode(";",$request->asisten_lab);
        $Lab->id_periode = $request->id_periode;
        $Lab->save();


        return redirect()->route('Lab.index')
        ->with('edit', 'Laboratorium Berhasil Diedit');
    }

    public function destroy($id)
    {
        Lab::where('id', $id)->delete();

        return redirect()->route('Lab.index')
            ->with('delete', 'Lab Berhasil Dihapus');
    }
}
