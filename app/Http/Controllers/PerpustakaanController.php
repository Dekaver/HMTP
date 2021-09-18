<?php

namespace App\Http\Controllers;
use App\Models\perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index()
    {
        $Perpustakaan = Perpustakaan::all();
        return view('admin.Perpustakaan.index', compact('Perpustakaan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.Perpustakaan.tambah');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'pertanyaan' => 'required',
        //     'jawaban' => 'required',
        // ]);
            $Perpustakaan = Perpustakaan::create([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'no_panggil' => $request->no_panggil,
                'ringkasan' => $request->ringkasan,
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

        return view('admin.Perpustakaan.editPerpustakaan', compact('Perpustakaan'));
    }

    public function update(Request $request, $id)
    {


        $Perpustakaan = Perpustakaan::find($id);
        $Perpustakaan->nama_Perpustakaan = $request->get('nama_Perpustakaan');
        $Perpustakaan->isi = $request->get('isi');
        $Perpustakaan->urutan = $request->get('urutan');

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
