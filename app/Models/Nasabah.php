<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nasabah extends Model
{
    use SoftDeletes;

    protected $table = 'ksa_nasabah';
    protected $primaryKey = 'ksa_id_nasabah';
    protected $dates = ['deleted_at'];
    // protected $fillable = ['ksa_kontrak_angsuran','ksa_tanggal_angsuran','ksa_nama_angsuran','ksa_biaya_angsuran','ksa_cara_angsuran'];
}
