<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi_details';
    protected $fillable = ['nama', 'total_harga', 'keterangan', 'id_akun'];
    protected $primaryKey = 'no_transaksi';

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

}
