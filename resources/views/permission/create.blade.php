<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Settings'" :subpage="'Permissions'" :category="'Add'" />
        <x-header>
            {{ __('Add Country') }}
            <a href="{{ route('permission.index') }}">
                <x-primary-button>Go Back</x-primary-button>
            </a>
        </x-header>
        <form action="{{ route('permission.store') }}" method="POST" class="w-full py-4 px-2 grid grid-cols-1 gap-4">
            @csrf
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Info</h2>
                <div class="w-full grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-2">
                        <x-input-label for="name"
                            class="w-[32%] after:content-['*'] after:text-red-500">Name</x-input-label>
                        <x-text-input type="text" id="name" name="name" class="w-4/5"
                            value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="role_id"
                            class="w-[32%] after:content-['*'] after:text-red-500">Role</x-input-label>
                        <x-select-box id="role_id" name="role_id[]" class="w-4/5" multiple="multiple">
                            <option value="">Select Role</option>
                            @foreach ($roles as $key => $item)
                                <option value="{{ $key }}" {{ old('role_id') === $key ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </x-select-box>
                        <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                    </div>
                </div>
            </div>
            <x-success-button class="justify-self-end w-[10%] flex justify-center">Add</x-success-button>
        </form>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#role_id').select2();
            });
        </script>
    @endpush
</x-app-layout>
