<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'judul'     => 'required',
            'kategori'  => 'required',
            'deskripsi' => 'required',
            'gambar.*'    => 'required|image|mimes:jpg,jpeg,png',
            'harga'     => 'required|numeric',
            'berat'     => 'required|numeric',
            'stok'      => 'required|numeric',
            'tag'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'Judul.required'     => 'Nama produk tidak boleh kosong',
            'kategori.required'     => 'Silahkan pilih salah satu produk kategori',
            'deskripsi.required' => 'Deskripsi produk tidak boleh kosong',
            'gambar.0.required'   => 'Gambar produk tidak boleh kosong',
            'gambar.0.image'   =>   'Harus bertipe gambar',
            'gambar.0.mimes'   => 'Gambar produk harus berektensi jpg, jpeg, png',
            'harga.required'    => 'Harga produk tidak boleh kosong',
            'berat.required'    => 'Berat produk tidak boleh kosong',
            'stok.required'     => 'Stok produk tidak boleh kosong',
            'tag.required'      => 'Tag produk tidak boleh kosong'
        ];
    }
}
