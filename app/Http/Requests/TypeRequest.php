<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'label' => 'required',
            'description' => 'required',
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
            'label.required' => 'Falta el assumpte',
            'description.required' => 'Falta una descripció'
        ];
    }
}
