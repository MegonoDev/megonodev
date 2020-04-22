<?php

use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('transaksi_details')->truncate();

        $transaksiDetail = [];
        $faker = Faker\Factory::create();
        // $date = Carbon::create(2020, 3, 7, 24);
        $transaksi = DB::table('transaksi_headers')->select('id','created_at')->get();
        $jumlah = rand(1, 10);
        $harga = rand(5000, 500000);

        for($i = 0; $i <= 40; $i++) {
            foreach($transaksi as $trans) {
                $transaksiDetail[] = [
                    'id_transaksi' => $trans->id,
                    'nama_barang' => $faker->company,
                    'jumlah' => $jumlah,
                    'harga' => $harga,
                    'jumlah_harga' => ($jumlah * $harga),
                    'created_at' => $trans->created_at
                ];
            }
        }

        DB::table('transaksi_details')->insert($transaksiDetail);

        
    }
}
