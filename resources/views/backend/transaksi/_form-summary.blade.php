<form id="form-summary">
    <div class="card-body">

        <div class="col-sm-12">
            <div>Nama : <span id="sum_nama" class="font-weight-bold"></span></div>
            <div>Akun : <span id="sum_akun"></span></div>
            <div>Pajak : <span id="sum_pajak"></span></div>
            <div>Keterangan : <span id="sum_keterangan"></span></div>
        </div>
        <div class="table">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Aksi</th>
                        <th>Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Harga</th>
                        <th class="text-right">Jumlah Harga</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">GRAND TOTAL</th>
                        <th colspan="4" class="text-right"> <input type="hidden" name="total_harga" value=""> <span id="sum_total_harga">0</span></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <button id="simpan_transaksi" type="button" class="btn btn-primary btn-sm">
                        Simpan Transaksi
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>