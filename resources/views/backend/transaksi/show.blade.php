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
                        <div class="card-header">
                            <strong>Transaksi</strong> <small>Header</small>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Invoice</label>
                                        <input class="form-control" id="nama" type="text" value="{{ $transaksis->invoice }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input class="form-control" id="nama" type="text" value="{{ $transaksis->nama }}" readonly>
                                    </div>
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