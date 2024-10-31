<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));

    }

    public function store( Request $request )
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    
        return redirect()->route('user.index');
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id, 
        'password' => 'nullable|min:5' 
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }
    $user->save();
    return redirect()->route('user.index')->with('success', ' Anjay User Berhasil Update Bang.'); 
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus bang');
    }
}
