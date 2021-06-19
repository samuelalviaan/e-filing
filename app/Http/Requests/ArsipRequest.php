<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArsipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode_arsip' => 'required',
            'kode_surat' => 'required',
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required|mimetypes:application/pdf',
            'file' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required',
        ];
    }
}
