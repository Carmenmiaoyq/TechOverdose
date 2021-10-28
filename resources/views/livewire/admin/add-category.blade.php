<div class="mt-5 md:mt-0 md:col-span-2">

    <x-alert.sucess-message />

        <form wire:submit.prevent="save">
            @csrf

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                            <input wire:model.defer="name" type="text" name="name" id="name" required autocomplete="name" value="{{ old('name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>


                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Category Photo</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        @if ($photo)

                                            <p class="text-gray-700 text-sm font-bold mb-2">Photo Preview</p>

                                            <img class="mx-auto rounded-full h-20 w-20 object-cover" src="{{ $photo->temporaryUrl() }}">
                                        @else
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @endif

                                        <div class="flex text-sm text-gray-600">
                                            <label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a image for the category</span>
                                                <input wire:model="photo" id="photo" name="photo" type="file" class="sr-only">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG up to 2MB
                                        </p>
                                        @error('photo') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    @if( $photo )
                        <button wire:click="removePhoto" type="button" class="mr-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Remove Photo
                        </button>
                    @endif

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Save
                    </button>
                </div>
            </div>
        </form>

</div>
