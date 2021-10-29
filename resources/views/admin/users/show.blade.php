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
                            <h3 class="text-lg font-medium leading-6 text-gray-900">User details</h3>
                            <p class="mb-5 mt-1 text-sm text-gray-600">
                                Use a permanent address where you can receive mail.
                            </p>
                            <div class="flex-shrink-0 h-50 w-50">
                                <img class="h-50 w-50 rounded-full" src="{{ !is_null($user->profile_photo_path) ? asset("storage/$user->profile_photo_path") : $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt-5 md:mt-0 md:col-span-2"> --}}

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">

                                    <div>
                                        <dl>
                                            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                Role
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $user->roles[0]->name ?? '' }}
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                Username
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $user->name }}
                                                </dd>
                                                <dt class="text-sm font-medium text-gray-500">
                                                Email
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ !is_null($user->email_verified_at) ? $user->email : $user->email . ' - NOT VERIFIED' }}
                                                </dd>
                                            </div>
                                            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                Status
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                @if( (int)$user->strikes != 3 )
                                                    {{ is_null($user->banned_until) ? 'Active' : 'Banned Until - ' . $user->banned_until }}
                                                @else
                                                    {{ 'Banned Forever' }}
                                                @endif
                                                </dd>
                                                <dt class="text-sm font-medium text-gray-500">
                                                Strikes
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ (int)$user->strikes }}
                                                </dd>
                                            </div>
                                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">
                                                Topics Created
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $user->topics_count }}
                                                </dd>
                                                <dt class="text-sm font-medium text-gray-500">
                                                Comments Posted
                                                </dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $user->comments_count }}
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- here --}}
                        {{-- </div> --}}
                </div>
            </div>
        </div>


        </div>
    </div>
</x-app-layout>
