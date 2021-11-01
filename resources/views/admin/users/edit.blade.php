<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('users.index') }}">
                <button class="flex items-center mb-5 px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                    </svg>
                    Go Back
                </button>
            </a>

            {{-- here --}}
<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Edit user</h3>
        <p class="mb-5 mt-1 text-sm text-gray-600">
          Use a permanent address where you can receive mail.
        </p>
        <div class="flex-shrink-0 h-50 w-50">
            <img class="h-50 w-50 rounded-full" src="{{ !is_null($user->profile_photo_path) ? asset("storage/$user->profile_photo_path") : $user->profile_photo_url }}" alt="{{ $user->name }}">
        </div>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">

        <livewire:admin.edit-users-form :id="$user->id" />
      {{-- <form action="#" method="POST"> --}}
      {{--   <div class="shadow overflow-hidden sm:rounded-md"> --}}
      {{--     <div class="px-4 py-5 bg-white sm:p-6"> --}}
      {{--       <div class="grid grid-cols-6 gap-6"> --}}
      {{--         <div class="col-span-6 sm:col-span-4"> --}}

      {{--           <label for="name" class="block text-sm font-medium text-gray-700">Username</label> --}}
      {{--           <input type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $user->name }}"> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6 sm:col-span-4"> --}}

      {{--           <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label> --}}
      {{--           <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $user->email }}"> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6 sm:col-span-3"> --}}
      {{--           <label for="country" class="block text-sm font-medium text-gray-700">Country</label> --}}
      {{--           <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> --}}
      {{--             <option>United States</option> --}}
      {{--             <option>Canada</option> --}}
      {{--             <option>Mexico</option> --}}
      {{--           </select> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6"> --}}
      {{--           <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label> --}}
      {{--           <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6 sm:col-span-6 lg:col-span-2"> --}}
      {{--           <label for="city" class="block text-sm font-medium text-gray-700">City</label> --}}
      {{--           <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6 sm:col-span-3 lg:col-span-2"> --}}
      {{--           <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label> --}}
      {{--           <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
      {{--         </div> --}}

      {{--         <div class="col-span-6 sm:col-span-3 lg:col-span-2"> --}}
      {{--           <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label> --}}
      {{--           <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
      {{--         </div> --}}
      {{--       </div> --}}
      {{--     </div> --}}
      {{--     <div class="px-4 py-3 bg-gray-50 text-right sm:px-6"> --}}
      {{--       <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"> --}}
      {{--         Save --}}
      {{--       </button> --}}
      {{--     </div> --}}
      {{--   </div> --}}
      {{-- </form> --}}
    </div>
  </div>
</div>

            {{-- here --}}
        </div>
    </div>
</x-app-layout>
