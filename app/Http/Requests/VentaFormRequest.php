<?php

namespace SisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
               'CboTipCom'=>'required',
               'txtSerCom'=>'required|max:11',
               'txtNumCom'=>'required|max:15',
               'txtCantVent'=>'required',
               'txtPreVen'=>'required',
               'CboCli'=>'required',
               'txtIdProd'=>'required',
               'txtTotVent'=>'required'
                ];
    }
}
