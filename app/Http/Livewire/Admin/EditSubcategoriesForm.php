<?php

namespace App\Http\Livewire\Admin;

use App\Models\SubCategory;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditSubcategoriesForm extends Component
{
    protected $listeners = ['subcategoryUpdated' => '$refresh'];

    public $parent_id;
    public $subcategories;

    public $subcategoryToUpdate;
    public $category_id;
    public $name;

    public function mount($id)
    {
        $this->parent_id = $id;
        $this->subcategories = SubCategory::select('id','name')
             ->where('category_id', $id)
             ->get();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'between:1,100', Rule::unique('sub_categories', 'name')->where(function($query) {
                return $query->where('category_id', $this->parent_id);
            })],
            'category_id' => 'required|exists:sub_categories,id|integer',
        ];
    }

    public function update()
    {
        $this->validate();

        $this->subcategoryToUpdate = SubCategory::find($this->category_id, ['id', 'name']);
        $this->subcategoryToUpdate->name = $this->name;

        $this->subcategoryToUpdate->save();

        $this->emit('subcategoryUpdated');

        session()->flash('sucess_message', 'Subcategory updated.');
    }


    public function render()
    {
        return view('livewire.admin.edit-subcategories-form');
    }
}
