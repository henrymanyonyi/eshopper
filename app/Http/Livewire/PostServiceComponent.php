<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostServiceComponent extends Component
{
    public $name;
    public $rate;
    public $serviceCategory;

    public function postService()
    {
        $service = new Service();
        $service->rate_per_hour = $this->rate;
        $service->service_category_id = $this->serviceCategory;
        $service->service_name = $this->name;
        $service->posting_user_id = Auth::user()->id;
        $service->save();
        $this->reset();
        return redirect()->route('myAccount');
    }

    public function render()
    {
        $serviceCategories = ServiceCategory::all();
        return view('livewire.post-service-component',['serviceCategories'=> $serviceCategories ])->layout('layouts.base');
    }
}
