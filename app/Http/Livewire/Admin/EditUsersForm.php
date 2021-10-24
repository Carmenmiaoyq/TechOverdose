<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditUsersForm extends Component
{
    public $user;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required',
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function update()
    {
        $this->validate();

        $this->user->save();

        session()->flash('sucess_message', 'User successfully updated.');


    }

    public function render()
    {
        return view('livewire.admin.edit-users-form');
    }
}
