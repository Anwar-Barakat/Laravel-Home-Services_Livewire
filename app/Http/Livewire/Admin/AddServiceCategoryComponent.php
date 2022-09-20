<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddServiceCategoryComponent extends Component
{

    use WithFileUploads;

    public $name, $slug, $image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'      => 'required|min:3',
            'slug'      => 'required|min:3',
            'image'     => 'required|mimes:png,jpg,jpeg|image'
        ]);
    }

    public function createNewCategory()
    {
        $this->validate([
            'name'      => 'required|min:3',
            'slug'      => 'required|min:3',
            'image'     => 'required|mimes:png,jpg,jpeg|image'
        ]);

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('categories', $imageName);

        ServiceCategory::create([
            'name'  => $this->name,
            'slug'  => $this->slug,
            'image' => $imageName,
        ]);

        toastr()->success('Service Category Has Been Added Successfully');
    }


    public function render()
    {
        return view('livewire.admin.add-service-category-component')->layout('layouts.master');
    }
}