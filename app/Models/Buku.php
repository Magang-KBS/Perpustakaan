<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = ['kode_buku', 'judul', 'kategori', 'pengarang', 'penerbit', 'tahun_terbit', 'stok'];

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'pengarang_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }
    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class, 'buku_id');
    }
}
