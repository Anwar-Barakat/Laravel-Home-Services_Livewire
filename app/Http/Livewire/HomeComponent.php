<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories         = ServiceCategory::inRandomOrder()->take(18)->get();
        $featuredServices   = Service::where('featured', '1')->inRandomOrder()->take(8)->get();
        $serviceCategories  = ServiceCategory::inRandomOrder()->take(8)->get();
        $sid                = collect(ServiceCategory::inRandomOrder()->take(5)->get()->modelKeys());
        $aservices          = Service::whereIn('service_category_id', $sid)->inRandomOrder()->take(8)->get();

        $slides             = Slider::where('status', 1)->get();

        return view('livewire.home-component', [
            'categories'            => $categories,
            'featuredServices'      => $featuredServices,
            'serviceCategories'     => $serviceCategories,
            'aservices'             => $aservices,
            'slides'                => $slides
        ])->layout('layouts.master');
    }
}