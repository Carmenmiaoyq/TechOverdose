<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class EditUsersForm extends Component
{
    public $user;


    public function mount($id)
    {
        $this->user = User::find($id, [
            'id',
            'name',
            'email',
            'profile_photo_path'
        ]);
    }

    protected function rules()
    {
        return  [
            'user.name' => ['required', 'alpha_dash', 'max:30', 'unique:users,name,'.$this->user->id . ',id'],
            'user.email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email,' .$this->user->id . ',id'],
        ];
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
