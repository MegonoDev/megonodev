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
        $akuns = Akun::paginate($this->limit);
        return view('akun.index', compact('bcrum', 'akuns'));
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

    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        $bcrum = $this->bcrum('Edit', route('akun.index'), 'Akun');

        return view('akun.edit', compact('akun', 'bcrum'));
    }

    public function update(AkunRequest $request,$id)
    {
        $data = $request->all();
        $akun = Akun::findOrFail($id);
        $akun->update($data);

        Session::flash('flash_notification', [
            'title' => 'Perhatian!',
            'level' => 'success',
            'message' => 'Berhasil mengedit'
        ]);
        return redirect()->route('akun.index');
    }
}
