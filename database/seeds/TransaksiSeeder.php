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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('transaksi_headers')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
        $transaksi = [];
        $faker = Faker\Factory::create();
        $date = Carbon::create(2020, 3, 7, 24);

        for($i = 0; $i<=10; $i++) {
            $date->now();
            $createDate = clone ( $date );


            $transaksi[] = [
                'invoice' => 'KL' . $i,
                'nama'  =>  $faker->name,
                'total_harga' => 10000,
                'pajak' => 10,
                'keterangan' => 'Fresh pembelian perangkat kerja',
                'id_user' => 1,
                'id_akun' => 1, 
                'created_at' => $createDate
            ];
        }

        DB::table('transaksi_headers')->insert($transaksi);
    }
}
