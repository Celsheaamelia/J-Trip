<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTiket extends Model
{
    protected $table = 'detail_tiket';
    protected $primaryKey = 'id_dtl_tiket';
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diperbarui_pada';

    protected $fillable = [
        'id_dtl_tiket',
        'id_tiket',
        'kode_tiket',
        'qr_code',
        'status',
        'digunakan_pada',
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket', 'id_tiket');
    }
}
