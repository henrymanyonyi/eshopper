<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $serviceCategories = ServiceCategory::paginate(10);
        return view('livewire.service-component',['serviceCategories'=> $serviceCategories])->layout('layouts.base');
    }
}
