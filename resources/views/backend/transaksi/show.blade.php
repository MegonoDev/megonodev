@extends('layouts.backend.master-backend')
@section('title')
Transaksi Pengeluaran
@endsection
@section('content')
<div class="container-fluid">
    <div id="ui-view">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <span class="font-weight-bold">Invoice#{{ $transaksi->invoice }}</span>
                            <span class="float-right">
                                <a href="#" class="btn btn-sm btn-secondary"> <i class="c-icon cil-print"></i> Print </a>
                            </span>
                        </div>
                        <div class="card-body">
                           <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Transaksi:</h6>
                                    <div><strong>{{ $transaksi->nama }}</strong></div>
                                    <div>Pajak : {{ $transaksi->pajak }}</div>
                                    <div>Akun : {{ $transaksi->akun->nama_akun }}</div>
                                    <div>Keterangan : {{ $transaksi->keterangan }}</div>
                                </div>
                                <div class="col-sm-4 offset-md-4">
                                    <h6 class="mb-3 float-right"><mark>Tanggal: {{ $transaksi->created_at }}</mark></h6>
                                </div>
                            </div>
                            
                            <table class="table table-bordered table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-right">Jumlah Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi->details as $detail)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $detail->nama_barang }}</td>
                                        <td class="text-center">{{ $detail->jumlah }}</td>
                                        <td class="text-right">{{ rupiah($detail->harga) }}</td>
                                        <td class="text-right">{{ rupiah($detail->jumlah_harga) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-center">GRAND TOTAL</th>
                                        <th colspan="4" class="text-right">{{ rupiah($transaksi->total_harga) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection