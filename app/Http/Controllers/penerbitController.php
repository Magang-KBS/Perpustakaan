<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;


class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    public function create()
    {

        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:pengarang,id',
            'name' => 'required|string|max:255',
        ]);

        $penerbit = new Penerbit();
        $penerbit->id = $request->id;
        $penerbit->name = $request->name;
        $penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan!');
    }
}
