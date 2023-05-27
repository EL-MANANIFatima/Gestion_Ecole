<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveNivRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       
        return [
            'Name' => [
                'required',
                Rule::unique('niveaux', 'Nom')->ignore($this->id),
            ],
        ];
        
    }
    public function messages()
    {
        return[
            'Name.unique' => 'The name must be unique'
           

        ];
    }
}
