<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi_headers';
    protected $fillable = ['invoice','nama', 'total_harga', 'pajak', 'keterangan', 'id_akun', 'id_user'];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class,'id_transaksi');
    }

    public function refreshTotalHarga()
    {
        $total_harga = 0;
        foreach($this->details as $detail) {
            $total_harga += $detail->jumlah_harga;
        }
        $this->total_harga = $total_harga;
        $this->save();
    }
}
