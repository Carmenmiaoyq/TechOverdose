<form wire:submit.prevent="update">

    <x-alert.sucess-message bold-message="Nice!" />

    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">

                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input wire:model.defer="user.name" type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $this->user->name }}">
                    @error('user.name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6 sm:col-span-4">

                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input wire:model.defer="user.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $this->user->email }}">
                    @error('user.email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
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
