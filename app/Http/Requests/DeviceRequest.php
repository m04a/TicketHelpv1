<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DeviceRequest extends FormRequest
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
        return[
            'title' => ['required', 'string', 'min:3', 'max:120'],
            'type' => ['required', 'integer'],
            'zone' => ['required', 'integer']
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
            'title.required' => 'Et faltat el nom',
            'type.required' => 'Tipus no seleccionat, ¿com ho has aconseguit?',
            'zone.required' => 'Aula sense seleccionar'
        ];
    }
}
