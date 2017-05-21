<?php

namespace SisVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'txtNombre'=>'required|max:100',            
            'txtNumDoc'=>'required|max:15',
            'txtDir'=>'max:70',
            'txtTel'=>'max:15',
            'txtEmail'=>'max:50'
        ];
    }
}
