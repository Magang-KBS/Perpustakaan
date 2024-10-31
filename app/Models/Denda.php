<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Denda extends Model
{

    use HasFactory;
    protected $table ='denda';
    protected $fillable = [
        'id_anggota',
        'jumlah_denda',
        'notes',
    ];
    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
    
}
