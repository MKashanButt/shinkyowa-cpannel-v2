<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CustomerAccount;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('customerAccount')
            ->when(Auth::user()->hasPermission('view_team_payments'), function ($query) {
                $managerAgentIds = User::where('manager_id', Auth::id())
                    ->where('role', 'agent')
                    ->pluck('id');

                $query->whereIn('user_id', $managerAgentIds);
            })
            ->when(Auth::user()->hasPermission('view_own_payments'), function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->paginate(8);

        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        $customerAccounts = CustomerAccount::when(Auth::user()->hasPermission('view_team_reserved_vehicles'), function ($query) {
            $managerAgentIds = User::where('manager_id', Auth::id())
                ->where('role', 'agent')
                ->pluck('id');

            $query->whereHas('customerAccount', function ($q) use ($managerAgentIds) {
                $q->whereIn('agent_id', $managerAgentIds);
            });
        })
            ->when(Auth::user()->hasPermission('view_own_reserved_vehicles'), function ($query) {
                $query->whereHas('customerAccount', function ($q) {
                    $q->where('agent_id', Auth::id());
                });
            })
            ->pluck('name', 'id');
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
        $customerAccounts = CustomerAccount::when(Auth::user()->hasPermission('view_team_reserved_vehicles'), function ($query) {
            $managerAgentIds = User::where('manager_id', Auth::id())
                ->where('role', 'agent')
                ->pluck('id');

            $query->whereHas('customerAccount', function ($q) use ($managerAgentIds) {
                $q->whereIn('agent_id', $managerAgentIds);
            });
        })
            ->when(Auth::user()->hasPermission('view_own_reserved_vehicles'), function ($query) {
                $query->whereHas('customerAccount', function ($q) {
                    $q->where('agent_id', Auth::id());
                });
            })
            ->pluck('name', 'id');
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
        if (Auth::check() && !Auth::user()->hasPermission('can_delete_payment')) {
            return abort(403, 'Unauthorized action.');
        }

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
