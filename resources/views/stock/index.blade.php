<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Vehicles'" :subpage="'Stocks'" />
        <x-header>
            {{ __('Stocks') }}
            <a href="{{ route('stock.create') }}">
                <x-primary-button>Create</x-primary-button>
            </a>
        </x-header>
        <div class="w-full h-[390px] overflow-y-scroll">
            <table class="min-w-full divide-y divide-[#e3e3e0] mt-4">
                <thead class="bg-gray-200 select-none">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Make</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Upload By</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e3e3e0]">
                    @foreach ($stocks as $key => $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['sid'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                @if ($data['thumbnail'])
                                    <img src="{{ asset('storage/' . $data['thumbnail']) }}" alt="vehicle image"
                                        class="w-12 h-12">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['make']->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['model'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['year'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ $data['currency']->symbol . $data['fob'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                @if ($data['customerAccount'])
                                    <x-danger-button>
                                        {{ __('Reserved') }}
                                    </x-danger-button>
                                @else
                                    <x-success-button>
                                        {{ __('Not Reserved') }}
                                    </x-success-button>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ $data['agent'] ? $data['agent']->name : '' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('stock.show', $data) }}">
                                        <x-secondary-button>View</x-secondary-button>
                                    </a>
                                    <a href="{{ route('stock.edit', $data) }}">
                                        <x-primary-button>Edit</x-primary-button>
                                    </a>
                                    <form action="{{ route('stock.destroy', $data) }}" method="POST"
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
                    {{ $stocks->links() }}
                </tfoot>
            </table>
        </div>
    </section>
</x-app-layout>
