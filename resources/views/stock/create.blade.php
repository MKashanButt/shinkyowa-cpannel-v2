<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Vehicles'" :subpage="'Stock'" :category="'Add'" />
        <x-header>
            {{ __('Add Stock') }}
            <a href="{{ route('stock.index') }}">
                <x-primary-button>Go Back</x-primary-button>
            </a>
        </x-header>
        <form action="{{ route('stock.store') }}" method="POST"
            class="w-full h-[390px] overflow-y-scroll py-4 px-2 grid grid-cols-1 gap-4" enctype="multipart/form-data">
            @csrf
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Images</h2>
                <div class="w-full grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-2">
                        <x-input-label for="thumbnail"
                            class="w-[32%] after:content-['*'] after:text-red-500">Thumbnail</x-input-label>
                        <input
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="image" type="file" name="thumbnail" value="{{ old('thumbnail') }}" required>
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="images"
                            class="w-[32%] after:content-['*'] after:text-red-500">Images</x-input-label>
                        <input
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="image" type="file" name="images[]" value="{{ old('images') }}" required multiple>
                        <x-input-error :messages="$errors->get('images')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Basic Info</h2>
                <div class="w-full grid grid-cols-3 gap-4">
                    {{-- <div class="flex items-center gap-2">
                        <x-input-label for="sid"
                            class="w-[32%] after:content-['*'] after:text-red-500">Id</x-input-label>
                        <x-text-input type="text" id="sid" name="sid" readonly class="w-4/5"
                            value="{{ old('sid', $sid) }}" required />
                        <x-input-error :messages="$errors->get('sid')" class="mt-2" />
                    </div> --}}
                    <div class="flex items-center gap-2">
                        <x-input-label for="chassis"
                            class="w-[32%] after:content-['*'] after:text-red-500">Chassis</x-input-label>
                        <x-text-input type="text" id="chassis" name="chassis" required class="w-4/5"
                            value="{{ old(key: 'chassis') }}" />
                        <x-input-error :messages="$errors->get('chassis')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="make_id"
                            class="w-[32%] after:content-['*'] after:text-red-500">Make</x-input-label>
                        <x-select-box name="make_id" id="make_id" class="w-4/5" required>
                            <option value="">Select Make</option>
                            @foreach ($makes as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('make_id') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @endforeach
                        </x-select-box>
                        <x-input-error :messages="$errors->get('make_id')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="model"
                            class="w-[32%] after:content-['*'] after:text-red-500">Model</x-input-label>
                        <x-text-input type="text" id="model" name="model" class="w-4/5"
                            value="{{ old('model') }}" required />
                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="year"
                            class="w-[32%] after:content-['*'] after:text-red-500">Year</x-input-label>
                        <x-text-input type="number" id="year" name="year" class="w-4/5"
                            value="{{ old(key: 'year') }}" required />
                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Pricing & Location</h2>
                <div class="w-full grid grid-cols-3 gap-4">
                    <div class="flex items-center gap-2">
                        <x-input-label for="fob"
                            class="w-[32%] after:content-['*'] after:text-red-500">Fob</x-input-label>
                        <x-text-input type="number" id="fob" name="fob" required class="w-4/5"
                            value="{{ old('fob') }}" />
                        <x-input-error :messages="$errors->get('fob')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="currency_id"
                            class="w-[32%] after:content-['*'] after:text-red-500">Currency</x-input-label>
                        <x-select-box name="currency_id" id="currency_id" class="w-4/5" required>
                            <option value="">Select Currency</option>
                            @foreach ($currencies as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('currency_id') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['code'] }}</option>
                            @endforeach
                            <x-input-error :messages="$errors->get('currency_id')" class="mt-2" />
                        </x-select-box>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="country_id"
                            class="w-[32%] after:content-['*'] after:text-red-500">Country</x-input-label>
                        <x-select-box name="country_id" id="country_id" class="w-4/5" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('country_id') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @endforeach
                        </x-select-box>
                        <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Vehicle Specs</h2>
                <div class="w-full grid grid-cols-3 gap-4">
                    <div class="flex items-center gap-2">
                        <x-input-label for="mileage"
                            class="w-[32%] after:content-['*'] after:text-red-500">Mileage</x-input-label>
                        <x-text-input type="text " id="mileage" name="mileage" required class="w-4/5"
                            value="{{ old('mileage') }}" />
                        <x-input-error :messages="$errors->get('mileage')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-1">
                        <x-input-label for="transmission"
                            class="w-[38%] after:content-['*'] after:text-red-500">Transmission</x-input-label>
                        <x-select-box name="transmission" id="transmission" class="w-4/5" required>
                            <option value="">Select Transmission</option>
                            <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>
                                {{ __('Manual') }}
                            </option>
                            <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>
                                {{ __('Automatic') }}
                            </option>
                        </x-select-box>
                        <x-input-error :messages="$errors->get('transmission')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="fuel"
                            class="w-[32%] after:content-['*'] after:text-red-500">Fuel</x-input-label>
                        <x-select-box name="fuel" id="fuel" class="w-4/5" required>
                            <option value="">Select Fuel</option>
                            <option value="diesel" {{ old('fuel') == 'diesel' ? 'selected' : '' }}>
                                {{ __('Diesel') }}
                            </option>
                            <option value="petrol" {{ old('fuel') == 'petrol' ? 'selected' : '' }}>
                                {{ __('Petrol') }}
                            </option>
                            <option value="electric" {{ old('fuel') == 'electric' ? 'selected' : '' }}>
                                {{ __('Electric') }}
                            </option>
                            <option value="hybrid" {{ old('fuel') == 'hybrid' ? 'selected' : '' }}>
                                {{ __('Hybrid') }}
                            </option>
                        </x-select-box>
                        <x-input-error :messages="$errors->get('fuel')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="doors"
                            class="w-[32%] after:content-['*'] after:text-red-500">Doors</x-input-label>
                        <x-text-input type="number" id="doors" name="doors" required class="w-4/5"
                            value="{{ old('doors') }}" />
                        <x-input-error :messages="$errors->get('doors')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-1">
                        <x-input-label for="category_id"
                            class="w-[38%] after:content-['*'] after:text-red-500">Category</x-input-label>
                        <x-select-box name="category_id" id="category_id" class="w-4/5" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('category_id') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @endforeach
                        </x-select-box>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-input-label for="body_type_id" class="w-[32%] after:content-['*'] after:text-red-500">Body
                            Type</x-input-label>
                        <x-select-box name="body_type_id" id="body_type_id" class="w-4/5" required>
                            <option value="">Select Body Type</option>
                            @foreach ($bodyType as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('currency_id') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @endforeach
                        </x-select-box>
                        <x-input-error :messages="$errors->get('currency_id')" class="mt-2" />
                    </div>
                    <div class="flex items-center gap-2 col-span-3">
                        <x-input-label for="features"
                            class="w-[9%] after:content-['*'] after:text-red-500">Features</x-input-label>
                        <x-text-input type="text " id="features" name="features" required class="w-[91%]"
                            value="{{ old('features') }}" />
                        <x-input-error :messages="$errors->get('features')" class="mt-2" />
                    </div>
                </div>
            </div>
            <x-success-button class="justify-self-end w-[10%] flex justify-center">Add</x-success-button>
        </form>
    </section>
</x-app-layout>
