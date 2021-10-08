<?php

namespace App\Http\Controllers;
use App\Models\hmtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HmtpController extends Controller
{
    public function index()
    {
        $hmtp = hmtp::all();
        return view('admin.hmtp.index', compact('hmtp'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.hmtp.addhmtp');
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
        $hmtp = hmtp::create([
            'deskripsi' => $request->deskripsi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'struktur_organisasi' => $file_name,
            'id_periode' => $request->id_periode,
        ]);
        return redirect()->route('hmtp.index')
            ->with('success', 'hmtp Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $hmtps = hmtp::where('id', $id)->first();
        return view('hmtpadmin.hmtp.show', compact('hmtp'));
    }


    public function edit($id)
    {
        $hmtp = hmtp::find($id);

        return $hmtp;
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
        $hmtp = hmtp::findOrFail($id);

        if ($request->has("struktur_organisasi")) {

            Storage::delete("public/struktur-organisasi/$hmtp->struktur_organisasi");

            $date = date("his");
            $extension = $request->file('struktur_organisasi')->extension();
            $file_name = "Struktur_organisasi_$date.$extension";
            $path = $request->file('struktur_organisasi')->storeAs('public/struktur-organisasi', $file_name);
            
            $hmtp->struktur_organisasi = $file_name;
        }

        $hmtp->deskripsi = $request->deskripsi;
        $hmtp->visi = $request->visi;
        $hmtp->misi = $request->misi;
        $hmtp->id_periode = $request->id_periode;

        $hmtp->save();

        return redirect()->route('hmtp.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        $hmtp = hmtp::findOrFail($id);
        Storage::delete("public/struktur-organisasi/$hmtp->struktur_organisasi");
        $hmtp->delete();

        return redirect()->route('hmtp.index')
            ->with('delete', 'hmtp Berhasil Dihapus');
    }
}
