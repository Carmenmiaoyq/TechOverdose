<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class ConfirmDeleteCategory extends Component
{
    public $category_id;
    public $showModal = false;

    public function mount($id)
    {
        $this->category_id = $id;
    }

    public function showModal()
    {
        $this->showModal = true;
    }

    public function deleteCategory()
    {
        $hasSubcategories = Category::find($this->category_id)->subcategories()->exists();

        if (!$hasSubcategories)
        {
            $category = Category::find($this->category_id)->delete();
            session()->flash('bold_message', "Done!");
            session()->flash('sucess_message', "Category '$category->name' deleted");
        }
        else
        {
            session()->flash('bold_message', "Error!");
            session()->flash('error_message', "That category has subcategories");
        }

        $this->showModal = false;

        return redirect()->to('/categories');
    }

    public function render()
    {
        return view('livewire.admin.confirm-delete-category');
    }
}
