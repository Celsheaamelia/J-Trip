<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $primaryKey = 'id_wisata';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_wisata',
        'name',
        'description',
        'price',
        'kuota_harian',
        'biaya_parkir',
        'pajak_persen',
        'include_parkir',
        'include_pajak',
        'location_name',
        'latitude',
        'longitude',
        'image',
    ];

    public function galeri()
    {
        return $this->hasMany(GaleriWisata::class, 'id_wisata', 'id_wisata');
    }

    public function tiket()
    {
    return $this->hasMany(Tiket::class, 'id_wisata', 'id_wisata');
    }
}
