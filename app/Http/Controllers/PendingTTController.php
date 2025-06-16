<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class PendingTTController extends Controller
{
    public function index()
    {
        $payments = Payment::with('customerAccount', 'stock', 'user')
            ->where('status', 'not approved')
            ->paginate(8);

        return view('pending-tt.index', compact('payments'));
    }
}
