<?php

namespace App\Http\Controllers;
use App\Models\Kalender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KalenderController extends Controller
{
    public function index()
    {
        $kalender = Kalender::all();
        return view('admin.kalender.index', compact('kalender'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.kalender.tambah');
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
        $path = $request->file('foto')->storeAs('public/kalender', $file_name);
        //end save foto
        $Kalender = Kalender::create([
            'deskripsi' => $request->deskripsi,
            'foto' => $file_name,
            'id_periode' => $request->id_periode,
        ]);
        return redirect()->route('kalender.index')
            ->with('success', 'Kalender Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Kalenders = Kalender::where('id', $id)->first();
        return view('kalender.show', compact('Kalender'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kalender = Kalender::findOrFail($id);

        return $kalender;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'foto' => 'required',
            'id_periode' => 'required',
        ]);

        $Kalender = Kalender::find($id);
        if ($request->has("foto")) {

            Storage::delete("public/kalender/$Kalender->foto");

            $date = date("his");
            $extension = $request->file('foto')->extension();
            $file_name = "foto_$date.$extension";
            $path = $request->file('foto')->storeAs('public/kalender', $file_name);
            
            $Kalender->foto = $file_name;
        }


        $Kalender->deskripsi = $request->get('deskripsi');
        $Kalender->id_periode = $request->get('id_periode');

        $Kalender->save();


        return redirect()->route('kalender.index')
        ->with('edit', 'Kalender Berhasil Diedit');
    }

    public function destroy($id)
    {
        $kalender = Kalender::findOrFail($id);
        Storage::delete("public/kalender/$kalender->foto");
        $kalender->delete();

        return redirect()->route('kalender.index')
            ->with('delete', 'Kalender Berhasil Dihapus');
    }
}
