<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_details';
    protected $fillable = ['id_transaksi','nama_barang','jumlah','harga','jumlah_harga'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public static function boot() {
        parent::boot();

        static::saved(function($model) {
            if ($model->jumlah_harga < 1) {
                $model->refreshJumlahHarga();
            }
        });
    }

    public function refreshJumlahHarga()
    {
        $jumlah_harga = $this->jumlah * $this->harga;
        $this->jumlah_harga = $jumlah_harga;
        $this->save();
    }
}
