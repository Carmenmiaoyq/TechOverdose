<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCategory extends Component
{
    use WithFileUploads;

    public $photo;

    public $name;


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

        $this->validate([
            'name' => 'required|unique:categories,name|string|between:1,100',
            'photo' => 'nullable|image|max:2048|mimes:png,jpeg,jpg'
        ]);

        if($this->photo !== null)
        {
            $url = $this->photo->store('category-photos', 'public');
        }

        Category::create([
            'name' => $this->name,
            'slug' => Str::of("$this->name")->slug('-'),
            'photo_path' => isset($url) ? $url : null
        ]);

        $this->emit('categoryAdded');

        session()->flash('bold_message', "New category added:");
        session()->flash('sucess_message', "$this->name");
    }

    public function removePhoto()
    {
        Storage::disk('local')->delete("/livewire-tmp/" . $this->photo->getFilename() );
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
