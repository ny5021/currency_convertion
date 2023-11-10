<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PairesRequest extends FormRequest
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
            'from_devise' => ['required'],
            'to_devise' => ['required'],
            'value' => ['required'],
        ];
    }
}
