<?php

namespace App\Http\Controllers;

use App\Models\CustomerAccount;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\User;
use App\Notifications\CustomerAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $accounts = CustomerAccount::with(['currency', 'agent'])
            ->addSelect([
                'buying' => Stock::selectRaw('COALESCE(SUM(fob), 0)')
                    ->whereColumn('customer_account_id', 'customer_accounts.id'),

                'deposit' => Payment::selectRaw('COALESCE(SUM(amount), 0)')
                    ->whereColumn('customer_account_id', 'customer_accounts.id')
            ])
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $payments = Payment::with('customerAccount')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        $pendingTT = Payment::with('customerAccount')
            ->where('status', 'not approved')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        return view('dashboard', compact('accounts', 'payments', 'pendingTT'));
    }
}
