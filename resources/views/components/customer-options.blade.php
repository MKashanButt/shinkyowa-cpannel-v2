<div class="flex items-center justify-between bg-blue-900 p-2 py-4 my-4 gap-2 rounded-md select-none">
    <div class="search flex flex-col gap-3 w-[55%] border-r-2 border-white pr-2">
        <h3 class="text-white text-xl font-bold uppercase">Search</h3>
        <div class="w-full flex items-center gap-2">
            <form action="/search/email" method="POST"
                class="flex items-center rounded-md bg-white overflow-hidden w-1/3">
                @csrf
                <input type="search" name="searchByEmail" id="searchByEmail"
                    value="{{ Request::get('searchByEmail') ? Request::get('searchByEmail') : '' }}"
                    class="border-0 w-[85%] text-sm" placeholder="Email.....">
                <button class="p-2 flex items-center justify-between w-[20%]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path d="M232 160a72 72 0 1072 72 72 72 0 00-72-72z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M283.64 283.64L336 336" />
                    </svg>
                </button>
            </form>
            <form action="/search/company" method="POST"
                class="flex items-center rounded-md bg-white overflow-hidden w-1/3">
                @csrf
                <input type="search" name="searchByCompany" id="searchByCompany" placeholder="Company....."
                    value="{{ Request::get('searchByCompany') ? Request::get('searchByCompany') : '' }}"
                    class="border-0 w-[85%] text-sm">
                <button class="p-2 flex items-center justify-between w-[20%]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512">
                        <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path d="M232 160a72 72 0 1072 72 72 72 0 00-72-72z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M283.64 283.64L336 336" />
                    </svg>
                </button>
            </form>
            <form action="/search/stockid" method="POST"
                class="flex items-center rounded-md bg-white overflow-hidden w-1/3">
                @csrf
                <input type="search" name="search" id="search" placeholder="Stock Id or Chassis..."
                    value="{{ Request::get('search') ? Request::get('search') : '' }}" class="border-0 w-[85%] text-sm">
                <button class="p-2 flex items-center justify-between w-[20%]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path d="M232 160a72 72 0 1072 72 72 72 0 00-72-72z" fill="none" stroke="currentColor"
                            stroke-miterlimit="10" stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M283.64 283.64L336 336" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="w-[45%] h-full flex flex-col gap-2">
        <h3 class="text-white text-xl font-bold uppercase">Actions</h3>
        <div class="w-full flex justify-between items-center gap-2 text-center">
            <a href={{ route('customer-account.create') }}
                class="w-1/3 rounded-md bg-green-700 text-white py-3 flex gap-2 items-center justify-center">
                Add Account
            </a>
            @if (Auth::user()->hasRole('admin'))
                <a href="/add-customer-payment/{{ isset($customeremail) ? $customeremail : '' }}"
                    class="w-1/3 rounded-md bg-white py-3">
                    Add Payment
                </a>
            @endif
            <a href="/add-customer-vehicle/{{ isset($customeremail) ? $customeremail : '' }}"
                class="w-1/3 rounded-md bg-white py-3">
                Add Vehicle
            </a>
        </div>
    </div>
</div>
