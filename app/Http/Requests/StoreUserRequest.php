<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'max:255'
            ],
            'password' => ['required'],
            'role_id' => ['required', 'exists:roles,id'],
            'manager_id' => ['nullable', 'exists:users,id'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The full name field is required.',
            'email.required' => 'The email address field is required.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'The password field is required.',
            'role_id.required' => 'Please select a role for the user.',
            'manager_id.exists' => 'The selected manager is invalid.',
        ];
    }

    public function attributes()
    {
        return [
            'role_id' => 'Role',
            'manager_id' => 'Manager',
        ];
    }
}
