<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AkunRequest extends FormRequest
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
            'nama_akun' => 'required',
            'type_akun' => 'required',
            'alur_akun' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_akun.required' => 'Nama Akun mohon diisi',
            'type_akun.required' => 'Tipe Akun mohon diisi',
            'alur_akun.required' => 'Alur Akun mohon diisi',
        ];
    }
}
