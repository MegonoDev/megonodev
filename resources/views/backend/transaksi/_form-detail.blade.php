<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-12">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}">
            
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-9">
            <label for="harga">Harga</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        Rp
                    </span>
                </div>
                <input type="number" name="harga" id="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}">
            </div>
        </div>

        <div class="form-group col-sm-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}">
            {!! $errors->first('jumlah', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-md-6">
                    <label class="col-form-label float-right" for="jumlah_harga">Jumlah Harga</label>
                </div>
                <div class="col-md-6">
                    <input type="number" name="jumlah_harga" id="jumlah_harga" class="form-control" value="0" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex justify-content-end">
                <button id="tambah_barang" type="button" class="btn btn-primary btn-sm">
                <i class="c-icon cil-plus"></i>    
                Tambah Item
                </button>
            </div>
        </div>
    </div>
</div>