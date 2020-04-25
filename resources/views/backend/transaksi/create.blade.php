@extends('layouts.backend.master-backend')
@section('title')
Tambah Transaksi
@endsection
@section('content')
<div class="container-fluid">
    <div id="ui-view">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Transaksi Header</strong>
                        </div>

                        @include('backend.transaksi._form-header')
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Transaksi detail</strong>
                        </div>
                        @include('backend.transaksi._form-detail')
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>Summary</strong>
                        </div>
                        @include('backend.transaksi._form-summary')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function() {

        //header form
        $('#nama').keyup(function() {
            var value = $(this).val();
            $('#sum_nama').html(value);
        });

        $('#id_akun').change(function() {
            var value = $("#id_akun option:selected").html();
            $('#sum_akun').html(value);
        });

        $('#keterangan').keyup(function() {
            var value = $(this).val();
            $('#sum_keterangan').html(value);
        });

        $('#pajak').keyup(function() {
            var value = $(this).val() + '%';
            $('#sum_pajak').html(value);
        });

        // detail form
        $('#harga').keyup(function() {
            var value = $(this).val();
            var jumlah = $('#jumlah').val();

            $('#jumlah_harga').val(value * jumlah);
        });

        $('#jumlah').keyup(function() {
            var value = $(this).val();
            var harga = $('#harga').val();

            $('#jumlah_harga').val(value * harga);
        });

        $('#tambah_barang').click(function() {
            addBarang();
        })


        function addBarang() {

            var nama_barang = $('#nama_barang').val();
            var harga = $('#harga').val();
            var jumlah = $('#jumlah').val();
            var jumlah_harga = $('#jumlah_harga').val();

            
        }
    });
</script>

@endpush
@push('css')

@endpush