<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditServiceCategoryComponent extends Component
{

    use WithFileUploads;

    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newImage;

    public function mount($category_id)
    {
        $serviceCategory = ServiceCategory::findOrFail($category_id);

        $this->category_id = $serviceCategory->id;
        $this->name = $serviceCategory->name;
        $this->slug = $serviceCategory->slug;
        $this->image = $serviceCategory->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'          => 'required|min:3',
            'slug'          => 'required|min:3',
            'newImage'      => 'mimes:png,jpg,jpeg|image'
        ]);
    }


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateServiceCategory()
    {
        $this->validate([
            'name'          => 'required|min:3',
            'slug'          => 'required|min:3',
            'newImage'      => 'mimes:png,jpg,jpeg|image'
        ]);

        if ($this->newImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('categories', $imageName);
        }

        ServiceCategory::where('id', $this->category_id)->update([
            'name'          => $this->name,
            'slug'          => $this->slug,
            'image'         => $imageName
        ]);

        toastr()->success('Service Category Has Been Updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.edit-service-category-component')->layout('layouts.master');
    }
}
