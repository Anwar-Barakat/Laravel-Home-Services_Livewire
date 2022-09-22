<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class AdminServicesComponent extends Component
{
    public function render()
    {
        $services   = Service::with(['category'])->latest()->get();
        return view('livewire.admin.admin-services-component', ['services' => $services])->layout('layouts.master');
    }
}