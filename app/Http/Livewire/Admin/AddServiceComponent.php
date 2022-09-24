<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddServiceComponent extends Component
{
    use WithFileUploads;

    public $name,
        $slug,
        $tagline,
        $service_category_id,
        $price,
        $discount,
        $discount_type,
        $thumbnail,
        $image,
        $description,
        $inclusion,
        $exclusion;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'                  => 'required|min:3',
            'slug'                  => 'required|min:3',
            'tagline'               => 'required|min:3',
            'service_category_id'   => 'required',
            'price'                 => 'required|numeric',
            'discount'              => 'required|numeric',
            'discount_type'         => ['required', 'in:fixed,percent'],
            'thumbnail'             => 'required|mimes:png,jpg,jpeg|image',
            'image'                 => 'required|mimes:png,jpg,jpeg|image',
            'description'           => 'required|min:10',
            'inclusion'             => 'required|min:10',
            'exclusion'             => 'required|min:10',
        ]);
    }

    public function createNewService()
    {
        $this->validate([
            'name'                  => 'required|min:3',
            'slug'                  => 'required|min:3',
            'tagline'               => 'required|min:3',
            'service_category_id'   => 'required',
            'price'                 => 'required|numeric',
            'thumbnail'             => 'required|mimes:png,jpg,jpeg|image',
            'image'                 => 'required|mimes:png,jpg,jpeg|image',
            'description'           => 'required|min:10',
            'inclusion'             => 'required|min:10',
            'exclusion'             => 'required|min:10',
        ]);

        $thumbnailName  = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $imageName      = Carbon::now()->timestamp . '.' . $this->image->extension();

        $this->thumbnail->storeAs('services/thumbnails', $thumbnailName);
        $this->image->storeAs('services', $imageName);

        Service::create([
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'tagline'               => $this->tagline,
            'service_category_id'   => $this->service_category_id,
            'price'                 => $this->price,
            'discount'              => $this->discount ?? null,
            'discount_type'         => $this->discount_type ?? null,
            'description'           => $this->description,
            'inclusion'             => str_replace('\n', '|', trim($this->inclusion)),
            'exclusion'             => str_replace('\n', '|', trim($this->exclusion)),
            'thumbnail'             => $thumbnailName,
            'image'                 => $imageName,
        ]);

        toastr()->success('Service Hsa Been Added Successfully');

        $this->reset();
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.add-service-component', ['categories' => $categories])->layout('layouts.master');
    }
}