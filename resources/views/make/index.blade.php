@php
    $sno = ($makes->currentPage() - 1) * $makes->perPage();
@endphp

<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Settings'" :subpage="'Makes'" />
        <x-header>
            {{ __('Makes') }}
            <a href="{{ route('make.create') }}">
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
                            Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Make</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Units Count</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#e3e3e0]">
                    @foreach ($makes as $key => $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                {{ str_pad($sno + $key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                @if ($data['image'])
                                    <img src="{{ asset('storage/' . $data['image']) }}" alt="make image"
                                        class="w-12 h-12">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['name'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">{{ $data['stock_count'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs">
                                <div class="flex gap-4">
                                    <a href="{{ route('make.edit', $data) }}">
                                        <x-primary-button>Edit</x-primary-button>
                                    </a>
                                    <form action="{{ route('make.destroy', $data) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <x-danger-button
                                            onclick="confirm('Are you sure you want to delete {{ ucwords($data['name']) }}?')">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="flex items-center">
                    {{ $makes->links() }}
                </tfoot>
            </table>
        </div>
    </section>
</x-app-layout>
