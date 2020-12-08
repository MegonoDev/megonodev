@extends('layouts.backend.master-backend')
@section('title')
Portfolio
@endsection
@section('content')
    <div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h4> <i class="c-icon cil-window-maximize"></i> Portfolio</h4>
                        </li>
                        <li class="list-inline-item float-right">
                            <div class="d-none d-md-block">
                                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary mx-3">
                                    <i class="c-icon cil-plus"></i>
                                    Tambah portfolio
                                </a>
                            </div>
                            <div class="d-md-none float-right">
                                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary mb-3">
                                    <i class="c-icon cil-plus"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if(!$portfolios->isEmpty())
                    @include('backend.portfolio._table')
                    @else
                    <div class="text-center text-muted">
                        <img src="{{ asset('img/no-data.png') }}" width="200" height="200" alt="data not found">
                        <br>
                        Belum ada portfolio. klik tambah akun untuk membuat portfolio baru.
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
