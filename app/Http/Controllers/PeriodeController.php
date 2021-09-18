<?php

namespace App\Http\Controllers;
use App\Models\periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $periode = periode::get();
        
        return view('admin.periode.index', compact('periode'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.periode.addperiode');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'pertanyaan' => 'required',
        //     'jawaban' => 'required',
        // ]);
            $periode = periode::create([
                'tahun' => $request->tahun,
                'semester' => $request->semester,
                'status' => $request->status,
                'struktur_organisasi' => $request->struktur_organisasi,
                'id_periode' => $request->id_periode,
            ]);
        return redirect()->route('periode.index')
            ->with('success', 'periode Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $periodes = periode::where('id', $id)->first();
        return view('periodeadmin.periode.show', compact('periode'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $periode = periode::find($id);

        return view('admin.periode.editperiode', compact('periode'));
    }

    public function update(Request $request, $id)
    {


        $periode = periode::find($id);
        $periode->nama_periode = $request->get('nama_periode');
        $periode->isi = $request->get('isi');
        $periode->urutan = $request->get('urutan');

        $periode->save();


        return redirect()->route('periodeadmin.periode.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        periode::where('id', $id)->delete();

        return redirect()->route('periodeadmin.periode.index')
            ->with('delete', 'periode Berhasil Dihapus');
    }
}
