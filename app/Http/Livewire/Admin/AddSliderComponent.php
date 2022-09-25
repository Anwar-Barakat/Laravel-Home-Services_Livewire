<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSliderComponent extends Component
{

    use WithFileUploads;
    public $title, $status, $image;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'         => 'required|min:3',
            'status'        => 'required|in:0,1',
        ]);
    }


    public function addNewSlide()
    {
        $this->validate([
            'title'         => 'required|min:3',
            'status'        => 'required|in:0,1',
        ]);

        if ($this->image) {
            $this->validate(['image'         => 'image|mimes:png,jpg|required']);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();

            $this->image->storeAs('slider/', $imageName);
        }

        Slider::create([
            'title'         => $this->title,
            'status'        => $this->status,
            'image'         => $imageName
        ]);

        $this->reset();


        toastr()->success('Slide Has Been Added Added Successfully');
    }

    public function render()
    {
        return view('livewire.admin.add-slider-component')->layout('layouts.master');
    }
}