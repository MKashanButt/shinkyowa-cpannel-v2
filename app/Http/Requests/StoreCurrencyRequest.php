<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCurrencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:3',
                'min:3',
                'uppercase',
                'unique:currencies,code'
            ],
            'symbol' => ['required', 'string', 'max:1', 'min:1', 'unique:currencies,symbol']
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Currency code is required',
            'code.min' => 'Currency code should be not less than 3 digits',
            'code.max' => 'Currency code should be not more than 3 digits',
            'code.uppercase' => 'Currency code must be in uppercase',

            'symbol.required' => 'Symbol is required',
            'symbol.min' => 'Symbol should be not less than 1 digits',
            'symbol.max' => 'Symbol should be not more than 1 digits',
        ];
    }
}
