<form id="form-header">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-12">
                <h6 class="float-right"><mark>Invoice#{{ $invoice }}</mark></h6>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="nama">Nama Transaksi</label>
                <input name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" id="nama" type="text" placeholder="Nama Transaksi">
                {!! $errors->first('nama', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="id_akun">Akun</label>
                {!! Form::select('id_akun',['' => '-- Pilih Akun --']+$akuns->toArray(),null,['id' => 'id_akun','class' => "form-control $errors->has('id_akun') ? 'is-invalid' : '')"]) !!}
                {!! $errors->first('id_akun', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="pajak">Pajak</label>
                <input name="pajak" class="form-control {{ $errors->has('pajak') ? 'is-invalid' : '' }}" id="pajak" type="number" placeholder="Pajak">
                {!! $errors->first('pajak', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" id="keterangan" type="text" placeholder="Keterangan">
                {!! $errors->first('keterangan', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
</form>