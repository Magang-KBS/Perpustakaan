<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denda;
use Illuminate\Http\Request;


class DendaController extends Controller
{
     // Method to display all denda records
     public function index()
     {
         $dendas = Denda::paginate(10); // Retrieve all records from the Denda model
         return view('denda.index', compact('dendas')); // Return the view with denda data
     }
 
     // Method to show the form for creating a new denda record
     public function create()
     {
         return view('denda.create'); // Return the create view
     }
 
     // Method to store a new denda record
     public function store(Request $request)
     {
         $request->validate([
             'id_pinjam' => 'required',
             'id_anggota' => 'required',
             'jumlah_denda' => 'required|numeric',
             'notes' => 'nullable|string',
         ]);
 
         Denda::create($request->all()); // Create a new denda record
         return redirect()->route('denda.index')->with('success', 'Denda created successfully.'); // Redirect with success message
     }
 
     public function edit($id)
     {
         // Gunakan find() untuk mengambil satu objek denda berdasarkan id
         $denda = Denda::find($id);
         
         // Kirim objek tunggal ke view
         return view('denda.edit', compact('denda'));
     }
 
     public function update(Request $request, $id)
     {
         $denda = Denda::find($id);
         $denda->update($request->all());
         return redirect()->route('denda.index')->with(['message'=>'Data Berhasil diperbarui']);
     }
 
     // Method to delete a denda record
     public function destroy(Denda $id)
     {
         $id->delete();
         return redirect()->route('denda.index')->with('message', 'Pengarang berhasil dihapus!'); // Redirect dengan pesan sukses
     }
    

}
