<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            "nama" => ["required"],
            "username" => ["required", "unique:users,username"],
            "class" => ["required"],
            "nisn" => ["required", "unique:students,nisn"],
            "nis" => ["required", "unique:students,nis"],
            "password" => ["required"],
            "alamat" => ["required"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required"]
        ];
    }
}
