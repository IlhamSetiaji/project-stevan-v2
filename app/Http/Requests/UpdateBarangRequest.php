<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $barangID = request('barangID');
        return [
            // 'kode_barang' => 'required|unique:barang,kode_barang,' . $barangID,
            'category_id' => 'required',
            'condition_id' => 'required',
            'room_id' => 'required',
            'keterangan_id' => 'required',
            'nama_barang' => 'required|string',
            'tahun_perolehan' => 'required',
            'nup' => 'required|string',
            'merk' => 'required|string',
            'kuantitas' => 'required|numeric',
            'harga_satuan_barang' => 'required|numeric',
            'harga' => 'required|numeric',
            'penggunaan' => 'required',
            'image' => 'nullable|max:10240|mimes:png,jpg,jpeg',
        ];
    }
}
