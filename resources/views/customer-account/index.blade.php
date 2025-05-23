@php
    $sno = ($accounts->currentPage() - 1) * $accounts->perPage();
@endphp

<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Sale'" :subpage="'Customer Accounts'" />
        <x-customer-options />
        <table class="min-w-full divide-y divide-[#e3e3e0]">
            <thead class="bg-gray-200 select-none">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        S.No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Company</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Buying</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Deposit</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Remaining</th>
                    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Agent</th>
                    @endif
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#e3e3e0]">
                @foreach ($accounts as $key => $data)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ str_pad($sno + $key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $data['customer']->customer_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $data['customer']->customer_company }}</td>
                        {{-- <td>{{ $buying ? $stat['customer']->currency . number_format($stat['buying']) : '' }}</td>
                            <td>{{ $deposit ? $stat['customer']->currency . number_format($stat['deposit']) : '' }}</td>
                            <td>{{ $buying ? $stat['customer']->currency . number_format($stat['buying'] - $stat['deposit']) : '' }} --}}
                        </td>
                        @if (Auth::user()->user != 'agent')
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="/agent-customers-account/{{ $data['customer']->agent }}">
                                    <button class="agent-btn">{{ $data['customer']->agent }}</button>
                                </a>
                            </td>
                        @endif
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="stage">
                                <a href="/customer-account/{{ $stat['customer']->customer_id }}">
                                    <button class="account-btn">View Account</button>
                                </a>
                                @if (Auth::user()->role != 'agent')
                                    <a href="/customer-account/destroy/{{ $stat['customer']->customer_id }}">
                                        <button class="danger"
                                            onclick="confirm('Are you sure you want to delete {{ ucwords($stat['customer']->customer_name) }} Account?')">
                                            Delete
                                        </button>
                                    </a>
                                    <a href="/customer-account/edit/{{ $stat['customer']->customer_id }}">
                                        <button class="primary">Edit</button>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-app-layout>
