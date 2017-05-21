<?php

namespace SisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoFormRequest extends FormRequest
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
            'CboPro'=>'required',
            'CboTipCom'=>'required|max:20',
            'txtSerCom'=>'max:7',
            'txtNumCom'=>'required|max:10',
            'txtIdProd'=>'required',
            'txtCant'=>'required',
            'txtPreCom'=>'required',            
            'txtPreVen'=>'required',
        ];
    }
}
