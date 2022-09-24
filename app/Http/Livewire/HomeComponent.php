<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories         = ServiceCategory::inRandomOrder()->take(18)->get();
        $featuredServices   = Service::where('featured', '1')->inRandomOrder()->take(8)->get();

        return view('livewire.home-component', [
            'categories'            => $categories,
            'featuredServices'      => $featuredServices,
        ])->layout('layouts.master');
    }
}