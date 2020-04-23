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

                                <a href="#" class="btn btn-sm btn-info"> <i class="c-icon cil-save"></i> Save </a>
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

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Barang</th>
                                            <th class="center">Jumlah</th>
                                            <th class="right">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksi->details as $detail)
                                        <tr>
                                            <td class="center">{{ $loop->iteration }}</td>
                                            <td class="left">{{ $detail->nama_barang }}</td>
                                            <td class="left">{{ $detail->jumlah }}</td>
                                            <td class="center">{{ $detail->harga }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">Catatan : -</div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <!-- <td class="left"><strong>Subtotal</strong></td>
                                                <td class="right">$8.497,00</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Discount (20%)</strong></td>
                                                <td class="right">$1,699,40</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>VAT (10%)</strong></td>
                                                <td class="right">$679,76</td>
                                            </tr>
                                            <tr> -->
                                                <td class="left"><strong>Total</strong></td>
                                                <td class="right"><strong>{{ $transaksi->total_harga }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection