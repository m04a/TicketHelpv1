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
            'content' => ['required', 'string'],
            'breakdown_id' => ['nullable','integer'],
            'question_id' => ['nullable','integer']
        ];
    }
    public function messages(){
        return [
        'content.required' => 'El contingut és invalid, revisa les dades introduïdes',
        ];
    }
}
