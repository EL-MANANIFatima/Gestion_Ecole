<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreRespotRequest extends FormRequest
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
                 Rule::unique('respos', 'email')->ignore($this->id),
            ],
            'FName' => 'required',
            'JC' => [
                'required',
                Rule::unique('respos', 'JC')->ignore($this->id),
            ],
            'Telephone' => [
                'required',
                Rule::unique('respos', 'Telephone')->ignore($this->id),
            ],
            'job' => 'required',
            'Address' => 'required',
        ];
    }
}
