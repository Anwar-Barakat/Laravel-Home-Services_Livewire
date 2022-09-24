<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class ServiceDetailComponent extends Component
{
    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function render()
    {
        $service            = Service::with(['category'])->where('slug', $this->service_slug)->first();
        $related_services   = Service::where('service_category_id', $service->service_category_id)
            ->where('slug', '!=', $service->slug)
            ->inRandomOrder()
            ->first();
        return view('livewire.admin.service-detail-component', [
            'service'           => $service,
            'related_services'  => $related_services
        ])->layout('layouts.master');
    }
}
