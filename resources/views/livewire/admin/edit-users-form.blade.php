<form wire:submit.prevent="update">

        <div>

            @if (session()->has('sucess-message'))

                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Nice!</strong>
                    <span class="block sm:inline">{{ session('sucess-message') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>


            @endif

    </div>

    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">

                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input wire:model="user.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $this->user->name }}">
                </div>

                <div class="col-span-6 sm:col-span-4">

                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input wire:model="user.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $this->user->email }}">
                </div>

                {{-- <div class="col-span-6 sm:col-span-3"> --}}
                {{--     <label for="country" class="block text-sm font-medium text-gray-700">Country</label> --}}
                {{--     <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> --}}
                {{--         <option>United States</option> --}}
                {{--         <option>Canada</option> --}}
                {{--         <option>Mexico</option> --}}
                {{--     </select> --}}
                {{-- </div> --}}

                {{-- <div class="col-span-6"> --}}
                {{--     <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label> --}}
                {{--     <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                {{-- </div> --}}

                {{-- <div class="col-span-6 sm:col-span-6 lg:col-span-2"> --}}
                {{--     <label for="city" class="block text-sm font-medium text-gray-700">City</label> --}}
                {{--     <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                {{-- </div> --}}

                {{-- <div class="col-span-6 sm:col-span-3 lg:col-span-2"> --}}
                {{--     <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label> --}}
                {{--     <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                {{-- </div> --}}

                {{-- <div class="col-span-6 sm:col-span-3 lg:col-span-2"> --}}
                {{--     <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label> --}}
                {{--     <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                {{-- </div> --}}
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Save
            </button>
        </div>
    </div>
</form>
