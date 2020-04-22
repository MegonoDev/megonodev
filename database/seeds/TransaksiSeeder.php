<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi_headers')->truncate();
        
        $transaksi = [];
        $faker = Faker\Factory::create();
        $date = Carbon::create(2020, 3, 7, 24);

        for($i = 0; $i<=10; $i++) {
            $date->now();
            $createDate = clone ( $date );

            $nama = ['Fery','gandi','rori'];

            $transaksi[] = [
                'invoice' => 'KL' . $i,
                'nama'  => rand($nama),
                'total_harga' => 10000,
                'pajak' => 10,
                'keterangan' => 'Fresh pembelian perangkat kerja',
                'id_user' => 1,
                'id_akun' => 2,
            ];
        }
    }
}
