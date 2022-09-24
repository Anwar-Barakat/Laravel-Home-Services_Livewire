<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::inRandomOrder()->take(18)->get();
        return view('livewire.home-component', [
            'categories'    => $categories
        ])->layout('layouts.master');
    }
}