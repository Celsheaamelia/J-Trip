<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
   protected $table = 'detail_user';

protected $primaryKey = 'id_dtl_user';

public $incrementing = false;

protected $keyType = 'string';

protected $fillable = [
    'id_dtl_user',
    'id_user',
    'jenis_identitas',
    'nomor_identitas',
    'jenis_kelamin',
    'tanggal_lahir',
    'kewarganegaraan',
];
}
