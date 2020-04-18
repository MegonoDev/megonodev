<?php

namespace App\Http\Controllers\b;

use App\Http\Controllers\b\BackendController;
use App\Http\Requests\AkunRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends BackendController
{
    public function index()
    {

        $bcrum = $this->bcrum('Akun');
        return view('akun.index', compact('bcrum'));
    }

    public function create()
    {
        $bcrum = $this->bcrum('Buat Transaksi', route('akun.index'), 'Akun');
        return view('akun.create', compact('bcrum'));
    }

    public function store(AkunRequest $request)
    {
        $data = $request->all();
        Akun::create($data);
        Session::flash('flash_notification', [
            'title' => 'Perhatian!',
            'level' => 'success',
            'message' => 'Akun Sukses dibuat'
        ]);
        return redirect()->route('akun.create');
    }
}
