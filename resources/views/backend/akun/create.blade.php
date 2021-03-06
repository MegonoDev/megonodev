@extends('layouts.backend.master-backend')
@section('title')
Tambah Akun
@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <form action="{{ route('akun.store') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>Tambah Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama_akun">Nama</label>
                                <input name="nama_akun" class="form-control {{ $errors->has('nama_akun') ? 'is-invalid' : '' }}" id="nama_akun" type="text" placeholder="Nama akun">
                                {!! $errors->first('nama_akun', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="type_akun">Tipe</label>
                                <select name="type_akun" class="form-control {{ $errors->has('type_akun') ? 'is-invalid' : '' }}" id="type_akun">
                                    <option value="">-- Pilih Tipe Akun --</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                    <option value="pendapatan">Pendapatan</option>
                                    <option value="harta">Harta</option>
                                </select>
                                {!! $errors->first('type_akun', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="alur_akun">Alur</label>
                                <div class="form-inline">
                                    <div class="custom-control custom-radio mr-3">
                                        <input type="radio" class="custom-control-input" id="alur_akun_debet" name="alur_akun" value="debet">
                                        <label class="custom-control-label" for="alur_akun_debet">Debet</label>
                                    </div>
                                    <div class="custom-control custom-radio mr-3">
                                        <input type="radio" class="custom-control-input" id="alur_akun_kredit" name="alur_akun" value="kredit">
                                        <label class="custom-control-label" for="alur_akun_kredit">Kredit</label>
                                    </div>
                                </div>
                                {!! $errors->first('alur_akun', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn  btn-outline-primary">
                                    <i class="c-icon cil-check"></i> Simpan
                                </button>

                                <button type="submit" name="stay" class="btn btn-primary mx-3">
                                    <i class="c-icon cil-check"></i> Simpan dan sisipkan berikutnya
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection