<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $name;


    protected $rules = [
        'name' => 'required|unique:categories,name|string|between:1,100'
    ];

    // change name of the atibute to show in error messages
    protected $validationAttributes = [
        'name' => 'category name'
    ];

    protected $messages = [
        'name.unique' => 'This :attribute already exists.',
    ];

    public function save()
    {
        $this->name = trim($this->name);

        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => Str::of("$this->name")->slug('-')
        ]);

        $this->emit('categoryAdded');

        session()->flash('bold_message', "New category added:");
        session()->flash('sucess_message', "$this->name");
    }

    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
