<?php

namespace App\Http\Controllers\b;

use App\Http\Controllers\b\BackendController;
use App\Http\Requests\AkunRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Akun;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AkunController extends BackendController
{
    public function index()
    {
        $bcrum = $this->bcrum('Akun');
        $akuns = Akun::paginate($this->limit);
        return view('backend.akun.index', compact('bcrum', 'akuns'));
    }

    public function create()
    {
        $bcrum = $this->bcrum('Buat Transaksi', route('akun.index'), 'Akun');
        return view('backend.akun.create', compact('bcrum'));
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

        if ($request->has('stay')) {
            $redirect = 'akun.create';
        } else {
            $redirect = 'akun.index';
        }
        
        return redirect()->route($redirect);
    }

    public function edit($id)
    {
        $akun = DB::table('akuns')->where('id_akun', $id)->first();
        $bcrum = $this->bcrum('Edit', route('akun.index'), 'Akun');

        return view('backend.akun.edit', compact('akun', 'bcrum'));
    }

    public function update(AkunRequest $request, $id)
    {
        $data = $request->all();
        $akun = Akun::findOrFail($id);
        $akun->update($data);

        Session::flash('flash_notification', [
            'title' => 'Perhatian!',
            'level' => 'success',
            'message' => 'Berhasil mengedit'
        ]);
        return redirect()->route('backend.akun.index');
    }

    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();

        Session::flash('flash_notification', [
            'title' => 'Perhatian!',
            'level' => 'error',
            'message' => 'Berhasil Menghapus'
        ]);

        return redirect()->route('akun.index');
    }
}
