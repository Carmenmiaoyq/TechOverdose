<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Livewire\Component;

class AddSubcategory extends Component
{
    protected $listeners = ['categoryAdded' => '$refresh'];

    public $categories;

    public $category_id;

    public $name;


    protected $messages = [
        'name.unique' => 'This :attribute already exists for the given parent category.',
    ];


    public function mount()
    {
        $this->categories = Category::all();
    }

    // update categories after listening the event
    public function hydrate()
    {
        $this->categories = Category::all();
    }

    // unique subcategory name only for the same parent category
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'between:1,100', Rule::unique('sub_categories', 'name')->where(function($query) {
                return $query->where('category_id', $this->category_id);
            })],
            'category_id' => 'required|exists:categories,id|integer'
        ];
    }

    // change name of the atibute to show in error messages
    protected $validationAttributes = [
        'name' => 'subcategory name'
    ];

    public function save()
    {
        $this->name = trim($this->name);
        /* dd($this->category_id); */
        $this->category_id = trim($this->category_id);

        $this->validate();


        SubCategory::create([
            'name' => $this->name,
            'slug' => Str::of("$this->name")->slug('-'),
            'category_id' => $this->category_id
        ]);

        session()->flash('bold_message', "New subcategory added:");
        session()->flash('sucess_message', "$this->name");
    }

    public function render()
    {
        return view('livewire.admin.add-subcategory',);
    }
}
