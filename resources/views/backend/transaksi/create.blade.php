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

@push('css')
<link rel="stylesheet" href="{{ asset('assets/sweetalert2/dist/sweetalert2.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/sweetalert2/dist/sweetalert2.js') }}"></script>
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
            var nama_barang = $('#nama_barang').val(),
                harga = $('#harga').val(),
                jumlah = $('#jumlah').val(),
                jumlah_harga = $('#jumlah_harga').val();
            if (nama_barang != '' && harga != '' && jumlah != '' && jumlah_harga != '') {
                var tr_id = parseInt(($('#tbody tr').length != 0) ? $('#tbody tr').length : 0) + 1,
                    trOpen = '<tr id="item_' + tr_id + '">',
                    td1 = '<td class="text-center"> <button data-jumlah_harga="' + jumlah_harga + '" class="btn btn-sm btn-danger" type="button" value="' + tr_id + '">hapus</button></td>',
                    td2 = '<td class="input">' + nama_barang + ' <input type="hidden" name="items[' + tr_id + '][nama_barang]" value="' + nama_barang + '"></td>',
                    td3 = '<td class="input text-center">' + jumlah + '<input type="hidden" name="items[' + tr_id + '][jumlah]" value="' + jumlah + '"></td>',
                    td4 = '<td class="input text-center">' + harga + '<input type="hidden" name="items[' + tr_id + '][harga]" value="' + harga + '"></td>',
                    td5 = '<td class="input text-right">' + jumlah_harga + '<input class="input_total_harga" type="hidden" name="items[' + tr_id + '][jumlah_harga]" value="' + jumlah_harga + '"></td>',
                    trClose = '</tr>',
                    result_tr = trOpen + td1 + td2 + td3 + td4 + td5 + trClose;
                $('#tbody').append(result_tr);
            } else {
                Swal.fire({
                    title: "Perhatian!",
                    text: "Data barang belum lengkap!",
                    icon: "warning",
                    showConfirmButton: "OK!",
                    allowOutsideClick: false
                });
            }
        }
        //summary form
        $('#form-summary').on('click', '.btn-primary', function() {
            simpanTransaksi();
        });
        $('#tbody').on('click', '.btn-danger', function() {
            var id = parseInt($(this).val());
            $('#item_' + id).remove();
            updateGrandTotal();
        });

        function updateGrandTotal() {
            var tagHarga = $('#sum_total_harga');
            var total_hargas = 0;
            var jumlah_hargas = $('#form-summary').find('.input_total_harga');
            $.each(jumlah_hargas, function(i, value) {
                total_hargas += parseInt($(this).val());
            });
            tagHarga.html(total_hargas);
            $('input[name="total_harga"]').val(total_hargas);
        }

        function simpanTransaksi() {
            //HAPUS INVALID DULU
            hapusInvalid();
            //PLEASE WAIT LOADING
            Swal.showLoading();
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
                    if (response.status == 'success') {
                        Swal.fire({
                            title: 'Transaksi Berhasil!',
                            icon: 'success',
                            html: 'Anda akan dialihkan kehalaman utama transaksi.',
                            timer: 2000,
                            allowOutsideClick: false,
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            }
                        }).then((result) => {
                            backTo(response.url);
                        })
                    } else {
                        Swal.fire(
                            'Transaksi Gagal!',
                            response.message,
                            'error'
                        );
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON,
                        count = Object.keys(errors.errors).length;

                    Swal.fire({
                        title: "Perhatian!",
                        text: count + " data masih salah!",
                        icon: "warning",
                        showConfirmButton: true,
                        confirmButtonText: "OK!",
                        allowOutsideClick: false
                    });
                    $.each(errors.errors, function(i, error) {
                        var el = $(document).find('[id="' + i + '"]');
                        var teks = '<div class="invalid-feedback">' + error[0] + '</div>';
                        el.after(teks);
                        $(el).addClass('is-invalid');
                    })
                }
            });
        }

        function hapusInvalid() {
            var y = $('.is-invalid').length;
            for (var i = 0; i < y; i++) {
                $('.is-invalid').removeClass('is-invalid');
            }
            var x = $('.invalid-feedback').length;
            for (var i = 0; i < x; i++) {
                $('.invalid-feedback').remove();
            }
        }

        function backTo(url) {
            window.location.href = url;
        }
    });
</script>

@endpush