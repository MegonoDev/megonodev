<?php

namespace App\Http\Controllers\b;

use App\Http\Controllers\b\BackendController;
use Illuminate\Http\Request;

class AkunController extends BackendController
{
    public function index()
    {

        $bcrum = $this->bcrum('Akun');
        return view('akun.index',compact('bcrum'));
    }

    public function create()
    {
        $bcrum = $this->bcrum('Buat Transaksi',route('akun.index'),'Akun');
        return view('akun.create',compact('bcrum'));
    }
}
