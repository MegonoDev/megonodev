<?php

namespace App\Http\Controllers\b;

use App\Models\Akun;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Invoice;

class TransaksiController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bcrum = $this->bcrum('Transaksi');
        $transaksis = Transaksi::paginate($this->limit);
        return view('backend.transaksi.index', compact('bcrum', 'transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akuns          = Akun::pluck('nama_akun', 'id_akun');
        $bcrum          = $this->bcrum('Tambah Transaksi', route('transaksi.index'), 'Transaksi');

        return view('backend.transaksi.create', compact('bcrum', 'akuns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataHeader = $request->except('items');
        $dataHeader['id_user'] = Auth::user()->id;
        $dataHeader['invoice'] = Invoice::getInvoice($this->kodeTransaksi);
        $transaksi = Transaksi::create($dataHeader);

        foreach ($request->items as $item) {
            $item['id_transaksi'] = $transaksi->id;
            TransaksiDetail::create($item);
        }
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $bcrum = $this->bcrum('Detail', route('transaksi.index'), 'Transaksi');
        return view('backend.transaksi.show', compact('transaksi', 'bcrum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
