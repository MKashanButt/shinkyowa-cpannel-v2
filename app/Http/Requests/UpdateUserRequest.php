<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
                'max:255',
                'unique:users,email,' . $this->user->id
            ],
            'password' => [
                'nullable',
            ],
            'role_id' => ['required', 'exists:roles,id'],
            'manager_id' => ['nullable', 'exists:users,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The full name field is required.',
            'email.required' => 'The email address field is required.',
            'email.unique' => 'This email address is already in use.',
            'password.confirmed' => 'The password confirmation does not match.',
            'role_id.required' => 'Please select a role for the user.',
            'manager_id.exists' => 'The selected manager is invalid.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'role_id' => 'Role',
            'manager_id' => 'Manager',
        ];
    }
}
