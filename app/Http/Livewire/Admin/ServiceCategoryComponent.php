<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceCategoryComponent extends Component
{
    use WithPagination;

    public function deleteServiceCategory($category_id)
    {
        $serviceCategory = ServiceCategory::findOrFail($category_id);
        if ($serviceCategory)
            unlink('images/categories/' . $serviceCategory->image);

        $serviceCategory->delete();
        toastr()->info('Service Category Has Been Deleted Successfully');
    }

    public function render()
    {
        $serviceCategories  = ServiceCategory::latest()->get();
        return view('livewire.admin.service-category-component', ['serviceCategories' => $serviceCategories])->layout('layouts.master');
    }
}