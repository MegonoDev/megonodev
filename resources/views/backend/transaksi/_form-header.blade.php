<form id="form-header">
    @csrf
    <div class="card-body">
        <div class="row">
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="nama">Nama Transaksi</label>
                <input name="nama" class="form-control" id="nama" type="text" placeholder="Nama Transaksi">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="id_akun">Akun</label>
                {!! Form::select('id_akun',['' => '-- Pilih Akun --']+$akuns->toArray(),null,['id' => 'id_akun','class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="pajak">Pajak</label>
                <input name="pajak" class="form-control" id="pajak" type="number" placeholder="Pajak">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" class="form-control" id="keterangan" type="text" placeholder="Keterangan">
            </div>
        </div>

    </div>
</form>