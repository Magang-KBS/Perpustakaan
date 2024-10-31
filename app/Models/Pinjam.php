<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{

    use HasFactory;
    protected $table ='pinjam';
    protected $fillable = [
        'tanggal_pinjam',
        'tanggal_maks_kembali',
        'tanggal_kembali',
        'id_user',
        'id_anggota',
        'id_buku',
        'id_penerbit',
    ];

    protected $primaryKey = 'id_pinjam';

    public $incrementing = true;

    public $timestamps = true;


    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    // Metode relasi untuk Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }
    
}
