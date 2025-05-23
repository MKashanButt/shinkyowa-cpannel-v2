<x-app-layout>
    <section>
        <x-breadcrumbs :page="'Customer Account'" :subpage="'Add'" />
        <div class="flex px-2 py-4 items-center justify-between">
            <h1 class="text-xl">Add Customer Account</h1>
            <x-primary-button>Go Back</x-primary-button>
        </div>
        <form action="{{ route('customer-account.store') }}" method="POST" class="w-full py-4 px-2 flex flex-col gap-4">
            @csrf
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Basic Info</h2>
                <div class="w-full flex gap-4 flex-wrap">
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="cid"
                            class="w-1/5 after:content-['*'] after:text-red-500">Id</x-input-label>
                        <x-text-input type="text" id="cid" name="cid" readonly class="w-4/5"
                            value="{{ $customerId }}" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="name"
                            class="w-1/5 after:content-['*'] after:text-red-500">Name</x-input-label>
                        <x-text-input type="text" id="name" name="name" required class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="company" class="w-1/5">Company</x-input-label>
                        <x-text-input type="text" id="company" name="company" class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="email" class="w-1/5">Email</x-input-label>
                        <x-text-input type="email" id="email" name="email" class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="phoneno" class="w-1/5 after:content-['*'] after:text-red-500">Phone
                            No</x-input-label>
                        <x-text-input type="text" id="phoneno" name="phoneno" required class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="whatsapp"
                            class="w-1/5 after:content-['*'] after:text-red-500">Whatsapp</x-input-label>
                        <x-text-input type="text " id="whatsapp" name="whatsapp" required class="w-4/5" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Credentials</h2>
                <div class="w-full flex gap-4 flex-wrap">
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="password"
                            class="w-1/5 after:content-['*'] after:text-red-500">Password</x-input-label>
                        <x-text-input type="password" id="password" name="password" required class="w-4/5" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Address</h2>
                <div class="w-full flex gap-4 flex-wrap">
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="address"
                            class="w-1/5 after:content-['*'] after:text-red-500">Address</x-input-label>
                        <x-text-input type="text" id="address" name="address" required class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="city"
                            class="w-1/5 after:content-['*'] after:text-red-500">City</x-input-label>
                        <x-text-input type="text" id="city" name="city" required class="w-4/5" />
                    </div>
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="country"
                            class="w-1/5 after:content-['*'] after:text-red-500">Country</x-input-label>
                        <x-text-input type="text" id="country" name="country" required class="w-4/5" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="w-full bg-gray-200/50 my-2 p-2 border-l-2 border-blue-900">Admin</h2>
                <div class="w-full flex gap-4 flex-wrap">
                    <div class="flex items-center gap-2 w-[32.5%]">
                        <x-input-label for="agent"
                            class="w-1/5 after:content-['*'] after:text-red-500">Agent</x-input-label>
                        <x-text-input type="text" id="address" name="address" required class="w-4/5" />
                    </div>
                </div>
            </div>
            <x-success-button>Add</x-success-button>
        </form>
        {{-- <form action="" method="post">
            @csrf
            <div class="item">
                <label for="cid">Customer Id:</label>
                <input type="text" id="cid" name="cid" readonly />
            </div>
            <div class="item">
                <label for="name">Customer Name:</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="item">
                <label for="company">Customer Company:</label>
                <input type="text" id="company" name="company" required />
            </div>
            <div class="item">
                <label for="phone">Phone No:</label>
                <input type="text" name="phone" id="phone" required />
            </div>
            <div class="item">
                <label for="whatsapp">Whatsapp No:</label>
                <input type="text" name="whatsapp" id="whatsapp" required />
            </div>
            <div class="item">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" id="email" />
            </div>  
            <div class="item">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" id="password" />
            </div>
            <div class="item">
                <label for="currency">Currency:</label>
                <select name="currency" id="currency" required>
                    <option value="" disabled selected>Currency</option>
                    <option value="$">$</option>
                    <option value="€">€</option>
                    <option value="¥">¥</option>
                </select>
            </div>
            </div>
            <div class="item">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="30" rows="4"></textarea>
            </div>
            <div class="item">
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="30" rows="4"></textarea>
            </div>
            <div class="item">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" />
            </div>
            <div class="item">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" />
            </div>
            <div class="item">
                <label for="cdescription">Agent:</label>
                <select name="agent" id="agent">

                </select>
            </div>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d=" M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add
            </button>
        </form> --}}
    </section>
</x-app-layout>
