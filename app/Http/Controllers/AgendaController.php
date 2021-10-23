<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::orderBy("created_at")->get();
        return view('admin.agenda.index', compact('agenda'));
    }

    public function create()
    {
        abort(404);
        return view('admin.agenda.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tempat' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'tanggal' => 'required|after:today',
        ]);
        $agenda = Agenda::create([
            'judul' => $request->judul,
            'tempat' => $request->tempat,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('agenda.index')
            ->with('success', 'agenda Berhasil Ditambahkan');
    }

    public function show($id)
    {
        abort(404);
        $agenda = Agenda::where('id', $id)->first();
        return view('agendaadmin.agenda.show', compact('agenda'));
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);

        return $agenda;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tempat' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'tanggal' => 'required|after:today',
        ]);
        $agenda = Agenda::findOrFail($id);
        $agenda->judul = $request->judul;
        $agenda->tempat = $request->tempat;
        $agenda->jam_mulai = $request->jam_mulai;
        $agenda->jam_selesai = $request->jam_selesai;
        $agenda->tanggal = $request->tanggal;

        $agenda->save();

        return redirect()->route('agenda.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('agenda.index')
            ->with('delete', 'agenda Berhasil Dihapus');
    }
}