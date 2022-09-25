<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;

class SliderComponent extends Component
{

    public function delete($id)
    {
        $slide = Slider::findOrFail($id);
        unlink('images/slider/' . $slide->image);

        $slide->delete();
        toastr()->info('Slide Has Been Deleted Successfully');
    }

    public function render()
    {
        $slides    = Slider::latest()->get();
        return view('livewire.admin.slider-component', ['slides' => $slides])->layout('layouts.master');
    }
}