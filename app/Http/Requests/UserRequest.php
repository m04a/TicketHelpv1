<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role_id > 1){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string'],
            'email' => ['required', 'string'],
            // 'value' => ['required', 'numeric'],

        ];
    }
    
    /**
     * Return message of error
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Nom d\'usuari no vàlid, revisa les dades introduïdes',
            'email.required' => 'Correu introduït no vàlid, revisa les dades introduïdes',
            // 'value.required' => 'Error al proccessar el rol d\'usuari',
        ];
    }
}
