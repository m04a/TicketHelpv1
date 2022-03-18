<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BreakdownRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'department_id' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El assumpte és invalid, revisa les dades introduïdes',
            'description.required' => 'La descripció és invalida, revisa les dades introduïdes',
            'status.required' => 'El estat és invalid, revisa les dades introduïdes',
            'department_id.required' => 'El departament és invalid, revisa les dades introduïdes'
        ];
    }
}
