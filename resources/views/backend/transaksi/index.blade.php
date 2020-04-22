@extends('layouts.backend.master-backend')
@section('title')
Transaksi Pengeluaran
@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h4> <i class="c-icon cil-window-maximize"></i> Transaksi Pengeluaran</h4>
                        </li>
                        <li class="list-inline-item float-right">
                            <div class="d-none d-md-block">
                                <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-outline-primary mx-3">
                                    <i class="c-icon cil-plus"></i>
                                    Transaksi Pengeluaran
                                </a>
                            </div>
                            <div class="d-md-none float-right">
                                <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-outline-primary mb-3">
                                    <i class="c-icon cil-plus"></i>

                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if(!$transaksis->isEmpty())
                    <table class="table table-responsive-sm table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Nama</th>
                                <th>Total Harga</th>
                                <th>Pajak / PPN</th>
                                <th>Akun</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->invoice }}</td>
                                <td>{{ $transaksi->nama }}</td>
                                <td>{{ rupiah($transaksi->total_harga) }}</td>
                                <td>{{ persen($transaksi->pajak) }}</td>
                                <td>{{ $transaksi->akun->nama_akun }}</td>
                                <td>{{ $transaksi->keterangan }}</td>
                                <td>
                                    <form action="{{ route('transaksi.destroy',$transaksi->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('transaksi.edit',$transaksi->id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit akun {{ $transaksi->nama }}">
                                            <i class="c-icon cil-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus akun {{ $transaksi->nama }}">
                                            <i class="c-icon cil-trash"></i>
                                        </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center text-muted">
                        <img src="{{ asset('img/no-data.png') }}" width="200" height="200" alt="data not found">
                        <br>
                        Belum ada Transaksi. klik Transaksi untuk melakukan Transaksi pengeluaran
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    {!! $transaksis->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection