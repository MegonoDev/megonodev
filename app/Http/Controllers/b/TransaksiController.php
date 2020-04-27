<?php

namespace App\Http\Controllers\b;

use App\Http\Requests\TransaksiRequest;
use App\Models\Akun;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Invoice;
use Illuminate\Support\Facades\Session;

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
    public function store(TransaksiRequest $request)
    {
        // dd($request->items);
        if ($request->items == null) return response()->json(['status' => 'error', 'message' => 'Item masih kosong']);
        $dataHeader = $request->except('items');
        $dataHeader['invoice'] = Invoice::getInvoice($this->kodeTransaksi);
        $transaksi = $request->user()->transaksis()->create($dataHeader);

        if (!$transaksi->id)        return response()->json(['status' => 'error', 'message' => 'Transaksi gagal tersimpan']);
        $items = [];
        foreach($request->items as $item) {
            $items[] = new TransaksiDetail($item);
        }
        $transaksi->details()->saveMany($items);

        Session::flash('flash_notification', [
            'title' => 'Berhasil!',
            'level' => 'success',
            'message' => 'Tambah transaksi berhasil.'
        ]);
        return response()->json(['url' => route('transaksi.index'), 'status' => 'success', 'message' => 'Tambah transaksi berhasil']);
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
