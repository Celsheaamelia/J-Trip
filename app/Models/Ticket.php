<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diperbarui_pada';

    protected $fillable = [
        'id_tiket',
        'id_user',
        'id_wisata',
        'kode_booking',
        'tanggal_kunjungan',
        'jumlah',
        'jumlah_pengunjung',
        'total_harga',
        'biaya_parkir',
        'pajak',
        'grand_total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata', 'id_wisata');
    }

    public function detailTiket()
    {
        return $this->hasMany(DetailTiket::class, 'id_tiket', 'id_tiket');
    }
}
