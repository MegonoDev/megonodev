<?php

namespace App\Http\Requests;

use App\Models\Akun;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransaksiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // header
            'nama'                 => 'required|string|min:3|max:255',
            'id_akun'              => ['required', Rule::in(Akun::pluck('id_akun'))],
            'pajak'                => 'required|alpha_num',
            'keterangan'           => 'required|string|max:255',
            'total_harga'         => 'required|alpha_num',
            // detail
            'items.*.nama_barang'  => 'required|string|max:255',
            'items.*.harga'        => 'required|alpha_num',
            'items.*.jumlah'       => 'required|alpha_num',
            'items.*.jumlah_harga' => 'required|alpha_num',
        ];
    }
}
