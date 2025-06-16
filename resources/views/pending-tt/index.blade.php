<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Finance'" :subpage="'Pending TTs'" />
        <x-header>
            {{ __('Pending TTs') }}
        </x-header>
        <div class="w-full h-[390px] overflow-y-scroll">
            <table class="min-w-full divide-y divide-[#e3e3e0] mt-4">
                <thead class="bg-gray-200 select-none">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Stock Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Payment Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            In YEN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Customer Account</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Agent</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e3e3e0]">
                    @foreach ($payments as $key => $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ $data['stock'] ? 'SKI-0' . $data['stock']->sid : 'Not Set' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ Str::limit($data['description'], 10) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['payment_date'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['amount'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['in_yen'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['customerAccount']->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['user']->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                <div class="flex gap-4">
                                    <a href="{{ route('payment.edit', $data['id']) }}">
                                        <x-primary-button>Approve</x-primary-button>
                                    </a>
                                    <form action="{{ route('payment.destroy', $data) }}" method="POST"
                                        x-data="{ open: false }">
                                        @method('DELETE')
                                        @csrf

                                        <!-- Delete Button - Triggers Modal -->
                                        <x-danger-button type="button" x-on:click="open = true">
                                            Delete
                                        </x-danger-button>

                                        <!-- Confirmation Modal -->
                                        <div x-show="open" x-transition
                                            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                            x-cloak>
                                            <div class="bg-white p-6 rounded-lg max-w-sm w-full">
                                                <p class="mb-4">Are you sure you want to delete payment?</p>
                                                <div class="flex justify-end space-x-4">
                                                    <button type="button" x-on:click="open = false"
                                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                        Confirm Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="flex items-center">
                    {{ $payments->links() }}
                </tfoot>
            </table>
        </div>
    </section>
</x-app-layout>
