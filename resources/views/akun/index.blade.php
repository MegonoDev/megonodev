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
                                    <a href="{{ route('akun.edit',$akun->id_akun) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit akun {{ $akun->nama_akun }}">
                                        <i class="c-icon cil-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection