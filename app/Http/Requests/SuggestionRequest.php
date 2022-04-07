<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SuggestionRequest extends FormRequest
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
            'token' => ['nullable'],
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:10'],
            'department_id' => ['required', 'integer'],
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
            'title.required' => "Falta l'assumpte",
            'description.required' => 'Falta una descripció',
            'department_id.required' => 'Falta el departament',
            'title.min' => "Posa com a minim 5 caracters a l'assumpte",
            'title.max' => "Posa com a minim 100 caracters a l'assumpte",
            'description.min' => "Posa com a minim 10 caracters a la descripció"
        ];
    }
}
