<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfResquest extends FormRequest
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
            'LName' => 'required',
            'Email' => [
                'required',
                    Rule::unique('profs', 'Email')->ignore($this->id),
            ],
            'FName' => 'required',
            'JC' => [
                'required',
                Rule::unique('profs', 'JC')->ignore($this->id),
            ],
            'Telephone' => [
                'required',
                Rule::unique('profs', 'Telephone')->ignore($this->id),
            ],
            'Mat_id' => 'required',
            'Genre_id' => 'required',
            'Address' => 'required',
        ];
    }
}
