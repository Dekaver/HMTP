<?php

namespace App\Http\Controllers;
use App\Models\hmtp;
use Illuminate\Http\Request;

class HmtpController extends Controller
{
    public function index()
    {
        $hmtp = hmtp::get();
        return view('admin.hmtp', compact('hmtp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.addhmtp');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'pertanyaan' => 'required',
        //     'jawaban' => 'required',
        // ]);
            $hmtp = hmtp::create([
                'nama_hmtp' => $request->nama_hmtp,
                'isi' => $request->isi,
                'urutan' => $request->urutan,
            ]);
        return redirect()->route('hmtpAdmin.index')
            ->with('success', 'hmtp Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $hmtps = hmtp::where('id', $id)->first();
        return view('hmtpAdmin.show', compact('hmtp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $hmtp = hmtp::find($id);

        return view('admin.edithmtp', compact('hmtp'));
    }

    public function update(Request $request, $id)
    {


        $hmtp = hmtp::find($id);
        $hmtp->nama_hmtp = $request->get('nama_hmtp');
        $hmtp->isi = $request->get('isi');
        $hmtp->urutan = $request->get('urutan');

        $hmtp->save();


        return redirect()->route('hmtpAdmin.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        hmtp::where('id', $id)->delete();

        return redirect()->route('hmtpAdmin.index')
            ->with('delete', 'hmtp Berhasil Dihapus');
    }
}
