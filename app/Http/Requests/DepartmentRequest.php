<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role_id > 0){
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
            'name' => ['required', 'string'],
        ];
    }
    public function messages(){
        return [
        'name.required' => 'El deparatament és invalid, revisa les dades introduïdes',
        ];
    }
}
