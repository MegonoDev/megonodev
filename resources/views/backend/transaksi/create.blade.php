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
            if (nama_barang != '' && harga != '' && jumlah != '' && jumlah_harga != '') {
                var tr_id = parseInt(($('#tbody tr').length != 0) ? $('#tbody tr:last').attr('id') : 0);
                var trOpen = '<tr id="' + (tr_id + 1) + '">';
                var td0 = '<td>' + (tr_id + 1) + '</td>';
                var td1 = '<td class="text-center"> <button class="btn btn-sm btn-danger" type="button" id="del_' + (tr_id + 1) + '">hapus</button></td>';
                var td2 = '<td class="input" name="nama_barang[]">' + nama_barang + '</td>';
                var td3 = '<td class="input" name="jumlah[]" class="text-center">' + jumlah + '</td>';
                var td4 = '<td class="input" name="harga[]" class="text-center">' + harga + '</td>';
                var td5 = '<td class="input" name="total_harga[]" class="text-center">' + jumlah_harga + '</td>';
                var trClose = '</tr>';
                var result_tr = trOpen + td0 + td1 + td2 + td3 + td4 + td5 + trClose;
                $('#tbody').append(result_tr);
            }
        }
        //summary form

        $('#simpan_transaksi').click(function() {
            var data = $.param($('td .input').map(function() {
                return {
                    name: $(this).attr('name'),
                    value: $(this).text().trim()
                };

                alert(data);
            }));
            alert(data);
        })
    });
</script>

@endpush
@push('css')

@endpush