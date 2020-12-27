@extends('layouts.backend.master-backend')
@section('title')
    Edit Portfolio
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('portfolio.update',$portfolio->id) }}" enctype="multipart/form-data" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <h4>Edit Portfolio</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama_portfolio">Nama</label>
                                <input type="text" name="nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" type="text" placeholder="Nama Portfolio" value="{{$portfolio->nama}}">
                                {!! $errors->first('nama', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="slug">Custom Slug</label>
                                <input type="text" name="slug" class="form-control{{$errors->has('slug') ? ' is-invalid' : ''}}" id="slug" placeholder="Custom Slug" value="{{$portfolio->slug}}">
                                {{-- <p class="help-block">URL baru akan terbuat {{ route('upload','your-custom-slug')}}</p> --}}
                                {!! $errors->first('slug', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control{{$errors->has('keterangan') ? ' is-invalid' : ''}}" id="keterangan" name="keterangan" rows="3">{{$portfolio->keterangan}}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <img src="{{ asset('img/thumbnail/'.$portfolio->thumbnail) }}" class="card-img-top mt-3" alt="foto" style="max-width: 200px;">
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
