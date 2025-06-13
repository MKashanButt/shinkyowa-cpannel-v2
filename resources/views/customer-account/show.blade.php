<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Customer Account'" :subpage="'Details'" />
        <div class="flex px-2 py-4 items-center justify-between">
            <h1 class="text-xl">Customer Account Details</h1>
            <a href="{{ route('customer-account.index') }}">
                <x-primary-button>Back to List</x-primary-button>
            </a>
        </div>

        <div class="w-full h-[390px] overflow-y-scroll bg-white rounded-lg shadow overflow-hidden">
            <!-- Basic Information Section -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Basic
                    Information</h2>
                <dl class="grid grid-cols-3 gap-4 mt-4">
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Customer ID</dt>
                        <dd class="w-4/5 text-gray-700">{{ 'SKC-0' . $customerAccount->cid }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Name</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->name }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Company</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->company ?? 'N/A' }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Email</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->email ?? 'N/A' }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Phone</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->phone }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">WhatsApp</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->whatsapp }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Currency</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->currency->name ?? 'N/A' }}</dd>
                    </div>
                    <div class="flex items-start gap-2 col-span-2">
                        <dt class="w-[14%] font-semibold">Description</dt>
                        <dd class="w-[90%] text-gray-700">{{ $customerAccount->description ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Address Section -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Address</h2>
                <dl class="grid grid-cols-3 gap-4 mt-4">
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Address</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->address }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">City</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->city }}</dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Country</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->country->name ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Admin Section -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Admin</h2>
                <dl class="flex gap-4 flex-wrap mt-4">
                    <div class="flex items-start gap-2 w-[32.5%]">
                        <dt class="w-[32%] font-semibold">Agent</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->agent->name ?? 'N/A' }}</dd>
                    </div>
                    <div class="flex items-start gap-2 w-[32.5%]">
                        <dt class="w-[32%] font-semibold">Created At</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->created_at->format('M d, Y H:i') }}</dd>
                    </div>
                    <div class="flex items-start gap-2 w-[32.5%]">
                        <dt class="w-[32%] font-semibold">Last Updated</dt>
                        <dd class="w-4/5 text-gray-700">{{ $customerAccount->updated_at->format('M d, Y H:i') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Financial Summary Section -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Financial
                    Summary</h2>
                <dl class="grid grid-cols-3 gap-4 mt-4">
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Total Buying</dt>
                        <dd class="w-4/5 {{ $customerAccount->buying < 0 ? 'text-red-700' : 'text-green-700' }}">
                            {{ '+' . number_format($customerAccount->buying, 2) . ' ' . $customerAccount->currency->code ?? '$' }}
                        </dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Total Deposits</dt>
                        <dd class="w-4/5 {{ $customerAccount->deposit < 0 ? 'text-red-700' : 'text-green-700' }}">
                            {{ '+' . number_format($customerAccount->deposit, 2) . ' ' . $customerAccount->currency->code ?? '$' }}
                        </dd>
                    </div>
                    <div class="flex items-start gap-2">
                        <dt class="w-[32%] font-semibold">Remaining Balance</dt>
                        <dd
                            class="w-4/5 {{ $customerAccount->buying - $customerAccount->deposit < 0 ? 'text-red-700' : 'text-green-700' }}">
                            {{ number_format($customerAccount->buying - $customerAccount->deposit, 2) . ' ' . $customerAccount->currency->code ?? '$' }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Reserved
                    Vehicles</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stock ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Make</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Model</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Year</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    FOB Price</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Shipment</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($customerAccount->stock as $stock)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        SKI-0{{ $stock->sid }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $stock->make->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $stock->model }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $stock->year }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $customerAccount->currency->symbol ?? '$' }}{{ number_format($stock->fob, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $stock->shipment->first()->vessel_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if ($stock->fob - $stock->getDepositAttribute() > 0)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Cleared
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No reserved
                                        vehicles found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment History Section -->
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900 text-lg font-medium">Payment
                    History</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    YEN Amount</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Received Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($customerAccount->payment as $payment)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $payment->payment_date }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span title="{{ $payment->description }}">
                                            {{ Str::limit($payment->description, 20) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $customerAccount->currency->symbol . number_format($payment->amount, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ¥{{ number_format($payment->in_yen, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $payment->payment_recieved_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $payment->status == 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No payment
                                        history found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="px-6 py-4 flex justify-end gap-4">
                <a href="{{ route('customer-account.edit', $customerAccount) }}">
                    <x-secondary-button>Edit</x-secondary-button>
                </a>
                <form action="{{ route('customer-account.destroy', $customerAccount) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this customer account?')">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">Delete</x-danger-button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
