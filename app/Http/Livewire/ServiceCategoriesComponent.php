<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $serviceCategories  = ServiceCategory::latest()->get();
        return view('livewire.service-categories-component', ['serviceCategories' => $serviceCategories])->layout('layouts.master');
    }
}