<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CustomerAccount;
use App\Models\Payment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('customerAccount')
            ->paginate(8);

        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        $customerAccounts = CustomerAccount::pluck('name', 'id');
        $stocks = Stock::pluck('sid', 'id');

        return view('payment.create', compact('customerAccounts', 'stocks'));
    }

    public function store(StorePaymentRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')
                ->store('payment_files', 'public');
            $validated['file'] = $filePath;
        }

        $validated['user_id'] = Auth::id();

        if (Auth::user()->hasRole('admin')) {

            $validated['status'] = 'approved';
        }

        Payment::create($validated);

        return redirect()->route('payment.index')
            ->with('success', 'Payment created successfully.');
    }

    public function edit(Payment $payment)
    {
        $customerAccounts = CustomerAccount::pluck('name', 'id');
        $stocks = Stock::pluck('sid', 'id');

        return view('payment.edit', compact('payment', 'customerAccounts', 'stocks'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($payment->file_path) {
                Storage::delete($payment->file_path);
            }

            $filePath = $request->file('file')->store('payment_files');
            $validated['file'] = $filePath;
        }

        $payment->update($validated);

        return redirect()->route('payment.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        try {
            if ($payment->file) {
                Storage::disk('public')->delete($payment->file);
            }

            $payment->delete();

            return redirect()->route('payment.index')
                ->with('success', 'Payment deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting payment: ' . $e->getMessage());
        }
    }
}
