@extends('layouts.backend.master-backend')
@section('title')
Edit Akun
@endsection
@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <form action="{{ route('akun.update',$akun->id_akun) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-header">
                        <h4>Edit Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama_akun">Nama</label>
                                <input name="nama_akun" class="form-control {{ $errors->has('nama_akun') ? 'is-invalid' : '' }}" id="nama_akun" type="text" placeholder="Nama akun" value="{{ $akun->nama_akun }}">
                                {!! $errors->first('nama_akun', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="type_akun">Tipe</label>
                                <?php
                                    Form::select('type_akun', 
                                    [   ''             => '-- Pilih Tipe Akun --',
                                        'pengeluaran'  => 'Pengeluaran',
                                        'pendapatan'   => 'Pendapatan',
                                        'harta'        => 'Harta'
                                     ],
                                     $akun->type_akun,
                                     [
                                        'class' => 'form-control '.($errors->has('type_akun') ? 'is-invalid' : ''),
                                        'id'    => 'type_akun'
                                        ]);
                                     ?>
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
            </div>
        </div>
    </div>
</div>

@endsection