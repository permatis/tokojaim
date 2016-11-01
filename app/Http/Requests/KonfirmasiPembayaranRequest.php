<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KonfirmasiPembayaranRequest extends Request
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
            'kd_pemesanan' => 'required',
            'nama_pengirim' => 'required',
            'jumlah'        => 'required',
            'rekening_pengirim' => 'required',
            'rekening_toko' => 'required',
            'metode_transfer'   => 'required',
            'tgl_transfer'  => 'required',
            'gambar'    => 'required'
        ];
    }
}
