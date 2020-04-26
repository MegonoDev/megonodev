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
            updateGrandTotal();
        })


        function addBarang() {

            var nama_barang = $('#nama_barang').val();
            var harga = $('#harga').val();
            var jumlah = $('#jumlah').val();
            var jumlah_harga = $('#jumlah_harga').val();
            if (nama_barang != '' && harga != '' && jumlah != '' && jumlah_harga != '') {
                var tr_id = parseInt(($('#tbody tr').length != 0) ? $('#tbody tr').length : 0);
                var trOpen = '<tr id="item_' + (tr_id + 1) + '">';
                var td1 = '<td class="text-center"> <button data-jumlah_harga="'+jumlah_harga+'" class="btn btn-sm btn-danger" type="button" value="' + (tr_id + 1) + '">hapus</button></td>';
                var td2 = '<td class="input">' + nama_barang + ' <input type="hidden" name="nama_barang[]" value="' + nama_barang + '"></td>';
                var td3 = '<td class="input text-center">' + jumlah + '<input type="hidden" name="jumlah[]" value="' + jumlah + '"></td>';
                var td4 = '<td class="input text-center">' + harga + '<input type="hidden" name="harga[]" value="' + harga + '"></td>';
                var td5 = '<td class="input text-right">' + jumlah_harga + '<input type="hidden" name="jumlah_harga[]" value="' + jumlah_harga + '"></td>';
                var trClose = '</tr>';
                var result_tr = trOpen + td1 + td2 + td3 + td4 + td5 + trClose;
                $('#tbody').append(result_tr);
            }
        }
        //summary form
        $('#form-summary').on('click', '.btn-primary', function() {
            simpanTransaksi();
        });
        $('#tbody').on('click', '.btn-danger', function() {
            var id = parseInt($(this).val());
            var hargaMin = $(this).data('jumlah_harga');
            $('#item_' + id).remove();
            updateGrandTotal();
        });

        function updateGrandTotal() {
            var tagHarga = $('#sum_total_harga');
            var total_hargas = 0;
            var jumlah_hargas = $('#form-summary').find('input[name="jumlah_harga[]"]');
            $.each(jumlah_hargas, function(i, value) {
                total_hargas += parseInt($(this).val());
            });
            tagHarga.html(total_hargas);
            $('input[name="total_harga"]').val(total_hargas);
        }

        function simpanTransaksi() {
            var fd = new FormData();
            var url = "{{ route('transaksi.store') }}",
                method = 'POST';
            var formHeader = $('#form-header').serializeArray();
            $.each(formHeader, function(key, input) {
                fd.append(input.name, input.value);
            });
            var formSummary = $('#form-summary').serializeArray();
            $.each(formSummary, function(key, input) {
                fd.append(input.name, input.value);
            });
            $.ajax({
                url: url,
                method: method,
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('.container-fluid').html(response);
                }

            });
        }
    });
</script>

@endpush
@push('css')

@endpush