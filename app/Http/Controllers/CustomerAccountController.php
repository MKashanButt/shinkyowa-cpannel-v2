<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerAccountRequest;
use App\Http\Requests\UpdateCustomerAccountRequest;
use App\Models\Country;
use App\Models\Currency;
use App\Models\CustomerAccount;
use App\Models\Payment;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerAccountController extends Controller
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
            ->paginate(10);

        return view('customer-account.index', compact('accounts'));
    }

    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $agents = User::where('role', 'agent')->pluck('name', 'id');
        $currencies = Currency::pluck('code', 'id');
        $customerIdLatest = CustomerAccount::latest()->value('cid');
        $customerId = $customerIdLatest ? $customerIdLatest : 1;

        return view('customer-account.create', compact(
            'countries',
            'customerId',
            'agents',
            'currencies'
        ));
    }

    public function store(StoreCustomerAccountRequest $request,)
    {
        $validated = $request->validated();

        $customerIdLatest = CustomerAccount::latest()->value('cid');
        $customerId = $customerIdLatest ? $customerIdLatest : 1;

        CustomerAccount::create([
            'cid'         => $customerId,
            'name'        => $validated['name'],
            'company'     => $validated['company'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'whatsapp'    => $validated['whatsapp'],
            'description' => $validated['description'] ?? null,
            'address'     => $validated['address'],
            'city'        => $validated['city'],
            'country_id'  => $validated['country_id'],
            'currency_id' => $validated['currency_id'],
            'agent_id'    => $validated['agent_id'] ?? Auth::id(),
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role'     => 'customer',
        ]);

        return redirect()->route('customer-account.index')
            ->with('success', 'Customer account created successfully.');
    }

    public function show(CustomerAccount $customerAccount)
    {
        $id = $customerAccount->id;
        $customerAccount->load([
            'currency:id,name,symbol,code',
            'country:id,name',
            'agent:id,name',
            'stock' => function ($query) use ($id) {
                $query->with('make', 'currency', 'shipment', 'payment')
                    ->where('customer_account_id', $id)
                    ->orderBy('created_at', 'desc');
            },
            'payment' => function ($query) {
                $query->with(['stock:id,sid'])
                    ->orderBy('payment_date', 'desc')
                    ->select([
                        'id',
                        'customer_account_id',
                        'stock_id',
                        'payment_date',
                        'description',
                        'amount',
                        'in_yen',
                        'payment_recieved_date',
                        'status',
                        'file_path',
                    ]);
            }
        ]);

        $customerAccount->buying = $customerAccount->stock->sum('fob');
        $customerAccount->deposit = $customerAccount->payment->sum('amount');

        $customerAccount->remaining_balance = $customerAccount->buying - $customerAccount->deposit;
        $customerAccount->payment_count = $customerAccount->payment->count();
        $customerAccount->reserved_stock_count = $customerAccount->stock->count();

        return view('customer-account.show', compact('customerAccount'));
    }

    public function edit(CustomerAccount $customerAccount)
    {
        $countries = Country::pluck('name', 'id');
        $agents = User::where('role', 'agent')
            ->pluck('name', 'id');
        $currencies = Currency::pluck('code', 'id');

        return view('customer-account.edit', compact(
            'customerAccount',
            'countries',
            'agents',
            'currencies'
        ));
    }

    public function update(UpdateCustomerAccountRequest $request, CustomerAccount $customerAccount)
    {
        $validated = $request->validated();

        $customerAccount->update([
            'name'        => $validated['name'],
            'company'     => $validated['company'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'whatsapp'    => $validated['whatsapp'],
            'description' => $validated['description'] ?? null,
            'address'     => $validated['address'],
            'city'        => $validated['city'],
            'country_id'  => $validated['country_id'],
            'currency_id' => $validated['currency_id'],
            'agent_id'    => $validated['agent_id'] ?? Auth::id(),
        ]);

        $user = User::where('email', $customerAccount->getOriginal('email'))->first();

        if ($user) {
            $userData = [
                'name'  => $validated['name'],
                'email' => $validated['email'],
            ];

            if (!empty($validated['password'])) {
                $userData['password'] = bcrypt($validated['password']);
            }

            $user->update($userData);
        }

        return redirect()->route('customer-account.index')
            ->with('success', 'Customer account updated successfully.');
    }
}
