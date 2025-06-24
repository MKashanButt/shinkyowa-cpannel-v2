<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check()
            && Auth::user()->hasPermission('add_shipment');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vessel_name' => 'required|string|max:255',
            'etd' => 'required|date',
            'eta' => 'required|date|after_or_equal:etd',
            'stock_id' => 'required|array',
            'stock_id.*' => [
                'required',
                'integer',
                Rule::exists('stocks', 'id')
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'vessel_name.required' => 'The vessel name field is required.',
            'eta.required' => 'The estimated time of arrival field is required.',
            'eta.date' => 'The ETA must be a valid date.',
            'eta.after_or_equal' => 'The ETA must be equal to or after the ETA.',
            'etd.required' => 'The estimated time of departure field is required.',
            'etd.date' => 'The ETD must be a valid date.',
            'stock_id.required' => 'At least one stock item must be selected.',
            'stock_id.*.exists' => 'One or more selected stock items are invalid.',
        ];
    }
}
