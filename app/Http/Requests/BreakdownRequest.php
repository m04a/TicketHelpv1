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
            'title' => ['required', 'string',  'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:5'],
            'status' => ['nullable', 'numeric'],
            'department_id' => ['required', 'numeric'],
            'manager_id' => ['numeric'],
            'zone_id' => ['required', 'numeric'],
            'device_id' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El assumpte és invalid, revisa les dades introduïdes',
            'description.required' => 'La descripció és invalida, revisa les dades introduïdes',
            'department_id.required' => 'El departament és invalid, revisa les dades introduïdes',
            'manager_id.required' => 'El manager és invalid, revisa les dades introduïdes',
            'zone_id.required' => 'La zone és invalida, revisa les dades introduïdes',
            'device_id.required' => 'El dispositiu és invalid, revisa les dades introduïdes',
            'title.min' => 'Posa com a minim 5 caracters en el assumpte',
            'title.max' => 'Posa com a maxim 100 caracters en el assumpte',
            'description.min' => 'Posa com a minim 5 caracters a la descripció'
        ];
    }
}
