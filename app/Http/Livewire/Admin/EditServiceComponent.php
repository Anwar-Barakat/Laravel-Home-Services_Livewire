<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditServiceComponent extends Component
{
    use WithFileUploads;

    public $service_slug;

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

    public $newImage, $newThumbnail;

    public function mount($service_slug)
    {
        $this->service_slug         = $service_slug;
        $service                    = Service::where('slug', $service_slug)->first();
        $this->name                 = $service->name;
        $this->slug                 = $service->slug;
        $this->tagline              = $service->tagline;
        $this->service_category_id  = $service->service_category_id;
        $this->price                = $service->price;
        $this->discount             = $service->discount;
        $this->discount_type        = $service->discount_type;
        $this->thumbnail            = $service->thumbnail;
        $this->image                = $service->image;
        $this->description          = $service->description;
        $this->inclusion            = str_replace('|', '\n', trim($this->inclusion));
        $this->exclusion            = str_replace('|', '\n', trim($this->exclusion));
    }

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
            'description'           => 'required|min:10',
            'inclusion'             => 'required|min:10',
            'exclusion'             => 'required|min:10',
            'newThumbnail'          => 'mimes:png,jpg,jpeg|image',
            'newImage'              => 'mimes:png,jpg,jpeg|image',
        ]);
    }

    public function updateService()
    {
        $this->validate([
            'name'                  => 'required|min:3',
            'slug'                  => 'required|min:3',
            'tagline'               => 'required|min:3',
            'service_category_id'   => 'required',
            'price'                 => 'required|numeric',
            'description'           => 'required|min:10',
            'inclusion'             => 'required|min:10',
            'exclusion'             => 'required|min:10',
            'newImage'              => 'mimes:png,jpg,jpeg|image',
        ]);

        $service                    = Service::where('slug', $this->service_slug)->first();

        if ($this->newThumbnail) {
            if ($this->thumbnail)
                unlink('images/services/thumbnails/' . $this->thumbnail);
            $this->validate(['newThumbnail'          => 'mimes:png,jpg,jpeg|image']);
            $thumbnailName      = Carbon::now()->timestamp . '.' . $this->newThumbnail->extension();
            $this->newThumbnail->storeAs('services/thumbnails', $thumbnailName);
        }

        if ($this->newImage) {
            if ($this->image)
                unlink('images/services/' . $this->image);
            $this->validate(['newImage'          => 'mimes:png,jpg,jpeg|image']);
            $imageName      = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('images/services/', $imageName);
        }




        Service::where('slug', $this->service_slug)->update([
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'tagline'               => $this->tagline,
            'service_category_id'   => $this->service_category_id,
            'price'                 => $this->price,
            'discount'              => $this->discount ?? null,
            'discount_type'         => $this->discount_type ?? null,
            'description'           => $this->description,
            'inclusion'             => str_replace('\n', ' ', trim($this->inclusion)),
            'exclusion'             => str_replace('\n', ' ', trim($this->exclusion)),
            'thumbnail'             => $thumbnailName,
            'image'                 => $imageName,
        ]);


        toastr()->success('Service Has Been Updated Successfully');
    }



    public function render()
    {
        $categories     = ServiceCategory::all();
        return view('livewire.admin.edit-service-component', ['categories' => $categories])->layout('layouts.master');
    }
}