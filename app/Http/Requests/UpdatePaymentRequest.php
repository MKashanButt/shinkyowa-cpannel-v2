<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->hasRole('admin');
    }

    public function rules(): array
    {
        return [
            'stock_id' => 'nullable|exists:stocks,id',
            'description' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'in_yen' => 'required|numeric|min:0',
            'payment_recieved_date' => 'required|date',
            'customer_account_id' => 'required|exists:customer_accounts,id',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'required|in:approved,not approved',
        ];
    }

    public function messages()
    {
        return [
            'stock_id.exists' => 'The selected stock ID is invalid.',
            'description.required' => 'The description field is required.',
            'payment_date.required' => 'The payment date field is required.',
            'payment_date.date' => 'The payment date must be a valid date.',
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a number.',
            'amount.min' => 'The amount must be at least 0.',
            'in_yen.required' => 'The YEN amount field is required.',
            'in_yen.numeric' => 'The YEN amount must be a number.',
            'in_yen.min' => 'The YEN amount must be at least 0.',
            'payment_recieved_date.required' => 'The payment received date field is required.',
            'payment_recieved_date.date' => 'The payment received date must be a valid date.',
            'customer_account_id.required' => 'The customer account field is required.',
            'customer_account_id.exists' => 'The selected customer account is invalid.',
            'file.required' => 'A file is required.',
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be a PDF, JPG, JPEG, or PNG.',
            'file.max' => 'The file may not be greater than 2MB.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The selected status is invalid.',
        ];
    }

    public function attributes()
    {
        return [
            'stock_id' => 'Stock ID',
            'description' => 'Description',
            'payment_date' => 'Payment Date',
            'amount' => 'Amount',
            'in_yen' => 'YEN Amount',
            'payment_recieved_date' => 'Payment Received Date',
            'customer_account_id' => 'Customer Account',
            'file' => 'File',
            'status' => 'Status',
        ];
    }
}
