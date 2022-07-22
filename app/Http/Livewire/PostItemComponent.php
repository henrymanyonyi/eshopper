<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostItemComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $preferred;
    public $image;    

    public function store()
    {
        $item = new Item();
        $item->item_name = $this->name;
        $item->item_price = $this->price;
        $item->preferred_item = $this->preferred;
        $imageName = Auth::user()->email. '-'.Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('item', $imageName);
        $item->image = $imageName;
        $item->user_id =Auth::user()->id;
        $item->save();
        $this->reset();

    }
    public function render()
    {
        return view('livewire.post-item-component')->layout('layouts.base');
    }
}
