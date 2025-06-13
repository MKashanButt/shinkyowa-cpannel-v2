@php
    $sno = ($accounts->currentPage() - 1) * $accounts->perPage();
@endphp

<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Customer Accounts'" />
        <x-customer-options />
        <div class="w-full h-[350px] overflow-y-scroll">
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
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ str_pad($sno + $key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['name'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['company'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs text-green-700">
                                {{ '+' . number_format($data['buying']) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs text-green-700">
                                {{ '+' . number_format($data['deposit']) }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-xs {{ $data['buying'] - $data['deposit'] < 0 ? 'text-red-700' : 'text-green-700' }}">
                                {{ number_format($data['buying'] - $data['deposit']) }}
                            </td>
                            @if (Auth::user()->role != 'agent')
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{-- <a href="{{ route('agent-customers', $data['agent']->id) }}"> --}}
                                    <x-primary-button class="agent-btn">
                                        {{ $data['agent']->name }}
                                    </x-primary-button>
                                    {{-- </a> --}}
                                </td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="stage">
                                    <a href="{{ route('customer-account.show', $data) }}">
                                        <x-secondary-button>View Account</x-secondary-button>
                                    </a>
                                    {{-- @if (Auth::user()->role != 'agent')
                                        <a href="/customer-account/destroy/{{ $data['customer']->customer_id }}">
                                            <button class="danger"
                                                onclick="confirm('Are you sure you want to delete {{ ucwords($stat['customer']->customer_name) }} Account?')">
                                                Delete
                                            </button>
                                        </a>
                                        <a href="/customer-account/edit/{{ $stat['customer']->customer_id }}">
                                            <button class="primary">Edit</button>
                                        </a>
                                    @endif --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
