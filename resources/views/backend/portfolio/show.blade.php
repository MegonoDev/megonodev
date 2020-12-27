@extends('layouts.backend.master-backend')
@section('title')
    Detail Portfolio
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <img src="{{ asset('img/thumbnail/'.$portfolio->thumbnail) }}" class="card-img-top" alt="foto">
                    <div class="card-body">
                        <h4 class="card-title">Detail Portfolio</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p><strong>Nama</strong></p>
                            <p>{{$portfolio->nama}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><strong>Slug</strong></p>
                            <p>{{$portfolio->slug}}</p>
                        </li>
                        <li class="list-group-item">
                            <p><strong>Keterangan</strong></p>
                            <p>{{$portfolio->keterangan}}</p>
                        </li>
                    </ul>
                    <div class="card-body">
                    <a href="{{route('portfolio.index')}}" class="btn btn-danger">Back</a>
                    <a href="{{route('portfolio.edit',$portfolio->id)}}" class="btn btn-info text-white">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
@endsection
