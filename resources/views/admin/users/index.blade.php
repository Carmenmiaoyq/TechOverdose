<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between">

                <div class="flex mb-4 items-center justify-center">
                    <form method="GET">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </button>
                            </span>
                            <input type="search" name="q" class="py-2 text-sm text-white bg-gray-900 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off" value="{{ request()->input('q') }}">
                        </div>
                    </form>
                </div>

            </div>

            <x-alert.sucess-message />

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="mb-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Role
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="{{ !is_null($user->profile_photo_path) ? asset("storage/$user->profile_photo_path") : $user->profile_photo_url }}" alt="{{ $user->name }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    @if( !is_null($user->email_verified_at) )
                                                        {{ is_null($user->banned_until) ? 'Active' : 'Banned'  }}
                                                    @else
                                                        {{ 'Email Not Verified' }}
                                                    @endif
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold {{ $user->role_name == 'regular' ? 'text-gray-500' : 'text-blue-500'}}">
                                                {{ $user->role_name }}
                                            </td>

                                            <td class="px-6 py-4 space-x-4 font-bold whitespace-nowrap text-sm text-gray-500">
                                                <a href="{{ route('users.show', $user->id) }}" class="p-1 text-indigo-600 hover:underline rounded-sm hover:bg-indigo-100">View</a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="p-1 text-green-600  hover:underline rounded-sm hover:bg-green-100">Edit</a>
                                                <livewire:admin.confirm-delete-user :id="$user->id">
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
