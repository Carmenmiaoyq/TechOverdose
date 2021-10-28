<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Livewire\Component;

class AddSubcategory extends Component
{
    use WithFileUploads;

    protected $listeners = ['categoryAdded' => '$refresh'];

    public $photo_sub;

    public $categories;

    public $category_id;

    public $name;


    protected $messages = [
        'name.unique' => 'This :attribute already exists for the given parent category.',
        'photo_sub' => 'nullable|image|max:2048|mimes:png,jpeg,jpg'
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
            'category_id' => 'required|exists:categories,id|integer',
            'photo_sub' => 'nullable|image|max:2048|mimes:png,jpeg,jpg'
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

        if($this->photo_sub !== null)
        {
            $url = $this->photo_sub->store('category-photos', 'public');
        }

        SubCategory::create([
            'name' => $this->name,
            'slug' => Str::of("$this->name")->slug('-'),
            'category_id' => $this->category_id,
            'photo_path' => isset($url) ? $url : null
        ]);

        session()->flash('bold_message', "New subcategory added:");
        session()->flash('sucess_message', "$this->name");
    }

    public function removePhoto()
    {
        Storage::disk('local')->delete("/livewire-tmp/" . $this->photo_sub->getFilename() );
        $this->photo_sub = null;
    }

    public function render()
    {
        return view('livewire.admin.add-subcategory',);
    }
}
