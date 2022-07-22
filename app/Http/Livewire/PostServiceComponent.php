<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostServiceComponent extends Component
{
    public $image;
    public function render()
    {
        return view('livewire.post-service-component')->layout('layouts.base');
    }
}
