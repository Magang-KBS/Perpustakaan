<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;


class PengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::all();
        return view('pengarang.index', compact('pengarang'));
    }

    public function create()
    {
        $pengarang = Pengarang::all();
        return view('pengarang.create', compact('pengarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:pengarang,id',
            'name' => 'required|string|max:255',
        ]);

        $pengarang = new Pengarang();
        $pengarang->id = $request->id;
        $pengarang->name = $request->name;
        $pengarang->save();

        return redirect()->route('pengarang.index')->with('success', 'Pengarang berhasil ditambahkan!');
    }

}

