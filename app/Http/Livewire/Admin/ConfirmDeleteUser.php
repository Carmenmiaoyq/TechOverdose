<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ConfirmDeleteUser extends Component
{
    public $user_id;
    public $showModal = false;

    public function mount($id)
    {
        $this->user_id = $id;
    }

    public function showModal()
    {
        $this->showModal = true;
    }

    public function deleteUser()
    {
        $user = User::find($this->user_id);
        $user->delete();

        $this->showModal = false;

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.admin.confirm-delete-user');
    }
}
