@php
    $sno = ($users->currentPage() - 1) * $users->perPage();
@endphp

<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Settings'" :subpage="'Users'" />
        <x-header>
            {{ __('Users') }}
            <a href="{{ route('user.create') }}">
                <x-primary-button>Create</x-primary-button>
            </a>
        </x-header>
        <div class="w-full h-[390px] overflow-y-scroll">
            <table class="min-w-full divide-y divide-[#e3e3e0] mt-4">
                <thead class="bg-gray-200 select-none">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            S.No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Customer Count</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Payment Count</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Members</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e3e3e0]">
                    @foreach ($users as $key => $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ str_pad($sno + $key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['name'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['role']->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['customer_account_count'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['payment_count'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ $data['role']->name != 'manager' ? 'Agent is Not a Manager' : $data['agent_manager_count'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                <div class="flex gap-4">
                                    <a href="{{ route('user.edit', $data) }}">
                                        <x-primary-button>Edit</x-primary-button>
                                    </a>
                                    <form action="{{ route('user.destroy', $data) }}" method="POST"
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
                                                <p class="mb-4">Are you sure you want to delete {{ $data['name'] }}?
                                                </p>
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
                    {{ $users->links() }}
                </tfoot>
            </table>
        </div>
    </section>
</x-app-layout>
