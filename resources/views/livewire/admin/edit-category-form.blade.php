<div class="mt-5 md:mt-0 md:col-span-2">

    <x-alert.sucess-message />
        {{-- {{ dd($this->category->name) }} --}}
        <form wire:submit.prevent="update">
            @csrf

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>

                            <input wire:model.defer="category.name" type="text" name="name" id="name" required autocomplete="name" value="{{ $this->category->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            @error('category.name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Save
                    </button>
                </div>
            </div>
        </form>

</div>
