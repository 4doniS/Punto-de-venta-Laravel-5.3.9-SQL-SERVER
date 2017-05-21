<?php

namespace SisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'cboCodCate'=>'required',
            'txtCod'=>'required|max:50',
            'txtNombre'=>'required|max:100',
            'txtStock'=>'required|numeric',
            'txtDesc'=>'max:512',
            'img'=>'mimes:jpeg,jpg,bmp,png'
        ];
    }
}
