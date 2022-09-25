<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSliderComponent extends Component
{
    use WithFileUploads;

    public $ttile, $image, $status, $slide_id;

    public $newImage;

    public function mount($slide_id)
    {
        $this->slide_id = $slide_id;

        $slide = Slider::findOrFail($slide_id);
        $this->title = $slide->title;
        $this->image = $slide->image;
        $this->status = $slide->status;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'         => 'required|min:3',
            'status'        => 'required|in:0,1',
        ]);
    }

    public function updateSlide()
    {
        $this->validate([
            'title'         => 'required|min:3',
            'status'        => 'required|in:0,1',
        ]);

        if ($this->newImage) {
            unlink('images/slider/' . $this->image);

            $this->validate(['newImage'         => 'image|mimes:png,jpg|required']);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slider/', $imageName);
        }

        $slide = Slider::findOrFail($this->slide_id);

        $slide->update([
            'title'         => $this->title,
            'status'        => $this->status,
            'image'         => $imageName ?? $this->image
        ]);

        toastr()->success('Slide Has Been Added Updated Successfully');
    }


    public function render()
    {
        return view('livewire.admin.edit-slider-component')->layout('layouts.master');
    }
}