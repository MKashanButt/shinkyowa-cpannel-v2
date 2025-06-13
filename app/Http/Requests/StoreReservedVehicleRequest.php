<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreReservedVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && !Auth::user()
            ->hasRole('customer');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sid' => ['required', 'exists:stocks,id'],
            'customer_account_id' => ['required', 'exists:customer_accounts,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'sid.required' => 'The Stock ID is required.',
            'sid.exists' => 'The selected stock does not exist.',
            'customer_account_id.required' => 'A Customer Account is required.',
            'customer_account_id.exists' => 'The provided customer account does not exist.',
        ];
    }
}
