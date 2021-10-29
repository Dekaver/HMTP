<?php

namespace App\Http\Controllers;
use App\Models\Kalender;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $Kalender = Kalender::all();
        return view('admin.Kalender.index', compact('Kalender'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.Kalender.tambah');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'pertanyaan' => 'required',
        //     'jawaban' => 'required',
        // ]);
            $Kalender = Kalender::create([
                'deskripsi' => $request->deskripsi,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'struktur_organisasi' => $request->struktur_organisasi,
                'id_periode' => $request->id_periode,
            ]);
        return redirect()->route('Kalender.index')
            ->with('success', 'Kalender Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Kalenders = Kalender::where('id', $id)->first();
        return view('Kalender.show', compact('Kalender'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Kalender = Kalender::find($id);

        return view('Kalender.editKalender', compact('Kalender'));
    }

    public function update(Request $request, $id)
    {


        $Kalender = Kalender::find($id);
        $Kalender->nama_Kalender = $request->get('nama_Kalender');
        $Kalender->isi = $request->get('isi');
        $Kalender->urutan = $request->get('urutan');

        $Kalender->save();


        return redirect()->route('Kalender.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kalender::where('id', $id)->delete();

        return redirect()->route('Kalender.index')
            ->with('delete', 'Kalender Berhasil Dihapus');
    }
}
