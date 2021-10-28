<div class="mt-5 md:mt-0 md:col-span-2">

    <x-alert.sucess-message />

    @if( $categories->isEmpty() )
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>To add a subcategory you first need to add a category!</p>
        </div>
    @else

        <form wire:submit.prevent="save" >
            @csrf

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Parent category for the subcategory</label>

                            <select wire:model.defer="category_id" id="category_id" name="category_id" required autocomplete="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=''>Choose a Category</option>
                                @foreach($categories as $category)
                                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Subcategory Name</label>
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

                                        @if ($photo_sub)

                                            <p class="text-gray-700 text-sm font-bold mb-2">Photo Preview</p>

                                            <img class="mx-auto rounded-full h-20 w-20 object-cover" src="{{ $photo_sub->temporaryUrl() }}">
                                        @else
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @endif

                                        <div class="flex text-sm text-gray-600">
                                            <label for="photo_sub" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a image for the category</span>
                                                <input wire:model="photo_sub" id="photo_sub" name="photo_sub" type="file" class="sr-only">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG up to 2MB
                                        </p>
                                        @error('photo_sub') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    @if( $photo_sub )
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

    @endif
</div>
