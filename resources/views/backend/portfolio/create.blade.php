@extends('layouts.backend.master-backend')
@section('title')
Tambah Portfolio
@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <form action="{{ route('portfolio.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>Tambah Portfolio</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama_portfolio">Nama</label>
                                <input type="text" name="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" type="text" placeholder="Nama Portfolio">
                                {!! $errors->first('nama', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="slug">Custom Slug</label>
                                <input type="text" name="slug" class="form-control{{$errors->has('slug') ? ' is-invalid' : ''}}" id="slug" placeholder="Custom Slug">
                                {{-- <p class="help-block">URL baru akan terbuat {{ route('upload','your-custom-slug')}}</p> --}}
                                {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control{{$errors->has('keterangan') ? ' is-invalid' : ''}}" id="keterangan" name="keterangan" rows="3"></textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('portfolio.index')}}" class="btn btn-danger">Kembali</a>
                            </div>
                            <div class="col md-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
