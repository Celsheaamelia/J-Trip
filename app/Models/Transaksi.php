<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'dibuat_pada';
    const UPDATED_AT = 'diperbarui_pada';

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'id_tiket',
        'kode_pesanan',
        'total_harga',
        'biaya_parkir',
        'pajak',
        'grand_total',
        'status_pembayaran',
        'metode_pembayaran',
        'snap_token',
        'paid_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket', 'id_tiket');
    }
}
