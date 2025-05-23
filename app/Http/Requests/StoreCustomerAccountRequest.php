<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerAccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:244'],
            'company' => ['required', 'string', 'max:244'],
            'phone' => ['required', 'string', 'max:15'],
            'whatsapp' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string', 'max:244'],
            'address' => ['required', 'string', 'max:244'],
            
        ];
    }
}
