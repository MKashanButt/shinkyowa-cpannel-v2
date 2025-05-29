<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateMakeRequest extends FormRequest
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
            'image' => [
                'sometimes', // Only validate if present
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048', // 2MB
                Rule::dimensions()
                    ->maxWidth(2000)
                    ->maxHeight(2000),
            ],
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('makes')
                    ->ignore($this->make),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPEG, PNG, and JPG images are allowed.',
            'image.max' => 'The image must not be larger than 2MB.',
            'image.dimensions' => 'The image dimensions must not exceed 2000x2000 pixels.',
            'name.required' => 'A name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed 100 characters.',
            'name.unique' => 'This name is already in use.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        if ($this->image === null) {
            $this->request->remove('image');
        }
    }
}
