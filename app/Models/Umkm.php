<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';
    protected $primaryKey = 'id_umkm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_umkm',
        'nama',
        'pemilik',
        'deskripsi',
        'id_wisata',
        'latitude',
        'longitude'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }
}
