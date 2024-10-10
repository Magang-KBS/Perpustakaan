<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tb_buku';

    // Primary key
    protected $primaryKey = 'id_buku';

    // Kolom yang dapat diisi
    protected $fillable = [
        'kode_buku',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'stok',
        'kategori',
    ];
}