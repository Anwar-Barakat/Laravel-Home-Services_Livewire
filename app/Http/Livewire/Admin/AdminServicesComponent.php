<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class AdminServicesComponent extends Component
{

    public function deleteService($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        unlink('images/services/thumbnails/' . $service->thumbnail);
        unlink('images/services/' . $service->image);
        $service->delete();
        toastr()->info('Service Has Been Deleted Successfully');
    }

    public function render()
    {
        $services   = Service::with(['category'])->latest()->get();
        return view('livewire.admin.admin-services-component', ['services' => $services])->layout('layouts.master');
    }
}