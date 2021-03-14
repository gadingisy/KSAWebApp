<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VA extends Model
{
    use SoftDeletes;

    protected $table = 'ksa_va';
    protected $primaryKey = 'ksa_va_id';
    protected $dates = ['deleted_at'];
    // protected $fillable = ['ksa_kontrak_angsuran','ksa_tanggal_angsuran','ksa_nama_angsuran','ksa_biaya_angsuran','ksa_cara_angsuran'];
}
