<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = ['tgl_pinjam', 'tgl_max_pinjam', 'tgl_kembali', 'id_anggota', 'id_petugas', 'status'];
}
