<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Stock') }}
            </h2>
            <a href="{{ route('stock.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-900 border border-transparent text-sm text-white hover:bg-blue-800 transition-colors duration-200">
                {{ __('Add New Vehicle') }}
            </a>
        </div>
    </x-slot>
</x-app-layout>
