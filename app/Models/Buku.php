<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table ='buku';
    protected $fillable = [
        'kode_buku',
        'judul',
        'tahun_terbit',
        'stok',
        'id_kategori',
        'id_pengarang',
        'sampul_buku',

    ];
    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'id_pengarang');
    }
}

