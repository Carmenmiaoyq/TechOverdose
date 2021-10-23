<div class="inline">
    {{-- <form wire:model="confirmDeleteUser" class="inline" action="{{ route('users.destroy', $user_id) }}" method="post"> --}}
    {{--     @csrf --}}
    {{--     @method('DELETE') --}}

        <button wire:click="showModal" class="font-bold p-1 text-red-600  hover:underline rounded-sm hover:bg-red-100" type="submit">
            Delete
        </button>

        <x-jet-confirmation-modal wire:model="showModal">
            <x-slot name="title">
                Delete Account
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete this account?
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                    Nevermind
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    Delete Account
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    {{-- </form> --}}
</div>
