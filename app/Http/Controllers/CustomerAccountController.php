<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerAccountRequest;
use App\Models\Country;
use App\Models\CustomerAccount;

use Illuminate\Http\Request;

class CustomerAccountController extends Controller
{
    public function index()
    {
        $accounts = CustomerAccount::with('currency', 'agent', 'stock', 'payment')
            ->orderBy('id', 'DESC')->paginate(10);
        return view('customer-account.index', compact('accounts'));
    }

    public function create()
    {
        $countries = Country::all();
        $customerIdLatest = CustomerAccount::latest()->value('cid');
        $customerId = $customerIdLatest ? $customerIdLatest : 'SKC-01';

        return view('customer-account.create', compact('countries', 'customerId'));
    }

    public function store(StoreCustomerAccountRequest $request)
    {
        dd($request);
    }
}
