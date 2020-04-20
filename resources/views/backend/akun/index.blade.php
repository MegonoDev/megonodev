@extends('layouts.backend.master-backend')
@section('title')
Akun
@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Akun</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('akun.create') }}" class="btn btn-sm btn-outline-primary mb-3">
                            <i class="c-icon cil-plus"></i>
                            Tambah akun
                        </a>
                    </div>
                    @if(!$akuns->isEmpty())
                    <table class="table table-responsive-sm table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Alur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($akuns as $akun)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $akun->nama_akun }}</td>
                                <td>{{ $akun->type_akun }}</td>
                                <td>{!! $akun->alur_akun !!}</td>
                                <td>
                                    <form action="{{ route('akun.destroy',$akun->id_akun) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('akun.edit',$akun->id_akun) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit akun {{ $akun->nama_akun }}">
                                            <i class="c-icon cil-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus akun {{ $akun->nama_akun }}">
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
                        Belum ada akun. klik tambah akun untuk membuat akun baru.
                    </div>
                    @endif
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection