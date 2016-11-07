<?php

namespace App\Http\Requests\crud;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'firstname.required'    => 'firstname tidak boleh kosong.',
            'lastname.required'     => 'lastname tidak boleh kosong.',
            'email.required'        => 'email tidak boleh kosong.',
            'address.required'     => 'address tidak boleh kosong.'
            
        ];
    }
}
