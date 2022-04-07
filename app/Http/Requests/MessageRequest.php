<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'content' => ['required', 'string', 'max:250'],
            'breakdown_id' => ['nullable','integer'],
            'question_id' => ['nullable','integer']
        ];
    }
    
    /**
     * Return message of error
     *
     * @return array
     */
    public function messages(){
        return [
        'content.required' => 'El contingut és invalid, revisa les dades introduïdes',
        'content.max' => 'Posa com a maxim 250 caracters al contingut del missatge',
        ];
    }
}
