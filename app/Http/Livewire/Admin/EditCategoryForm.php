<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class EditCategoryForm extends Component
{
    public $category;

    public function mount($id)
    {
        $this->category = Category::with('subcategories')->find($id);
    }

    protected function rules()
    {
        return  [
            'category.name' => ['required', 'string', 'between:1,100', 'unique:categories,name,'.$this->category->id . ',id'],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->category->save();

        session()->flash('sucess_message', 'User successfully updated.');
    }


    public function render()
    {
        return view('livewire.admin.edit-category-form');
    }
}
