<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'status' => ['nullable', 'numeric'],
            'description' => ['required', 'string', 'min:5'],
            'departament' => ['required', 'numeric'],
            'manager_id' => ['numeric'],
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
            'title.required' => 'Falta el assumpte',
            'description.required' => 'Falta una descripció',
            'department.required' => 'Posa un departament no siguis hacker',
            'manager.required' => 'no has posat ningun manager',
            'title.min' => 'Posa com a minim 5 caracters en el assumpte',
            'title.max' => 'Posa com a maxim 100 caracters en el assumpte',
            'description.min' => 'Posa com a minim 5 caracters a la descripció'
        ];
    }
}
