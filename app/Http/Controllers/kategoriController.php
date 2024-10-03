<?php

namespace App\Http\Controllers;

use App\Models\kategori;    
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function loadAllCategory(){
        $all_category = kategori::all();
        return view ('kategori.index');
    }

    public function loadAddCategoryForm(){
        return view ('kategopri.add-category');        
    }
}
