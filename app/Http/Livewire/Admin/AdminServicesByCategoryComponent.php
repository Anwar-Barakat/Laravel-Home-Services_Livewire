<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;

class AdminServicesByCategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $category   = ServiceCategory::with(['services'])->where('slug', $this->category_slug)->first();
        return view('livewire.admin.admin-services-by-category-component', ['category' => $category])->layout('layouts.master');
    }
}