<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
{
    $title = 'Anggota'; // Define the title
    $q = $request->query('q');
    $anggotas = Anggota::where('nama_anggota', 'like', '%' . $q . '%')
        ->paginate(5)
        ->withQueryString();
    $no = $anggotas->firstItem();        
    return view('anggota.index', compact('title', 'anggotas', 'q', 'no')); // Pass the $title variable
}

    public function create()
    {
        $title = 'Tambah Anggota';
        $anggotas = Anggota::orderBy('nama_anggota')->get();
        return view('anggota.create',compact('title','anggotas'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota'=>'required',
            'no_telepon' => 'required',
            'nim' => 'nullable',
            'email' => 'required|email',
        ]);
        $anggota = new Anggota($request->all());
        $anggota->save();
        return redirect()->route('anggota.index')->with(['message'=>"Data Berhasil ditambahkan"]);
    }

    public function edit($id)
    {
        $title = 'Ubah Anggota';
        $anggota = Anggota::where('id',$id)->first();        
        return view('anggota.edit',compact('title','anggota'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        return redirect()->route('anggota.index')->with(['message'=>'Data Berhasil diperbarui']);
    }

    public function destroy(Anggota $id)
    {
        $id->delete();
        return redirect()->route('anggota.index')->with(['message'=>'Data Berhasil dihapus!']);
    }
}
