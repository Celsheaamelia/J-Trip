<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriWisata extends Model
{
    protected $table = 'galeri_wisata';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_wisata',
        'gambar',
        'created_at',
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }
}
