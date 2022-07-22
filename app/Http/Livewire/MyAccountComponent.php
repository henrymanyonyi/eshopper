<?php

namespace App\Http\Livewire;

use App\Models\Bid;
use App\Models\Item;
use Faker\Core\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyAccountComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function cancelBid($id)
    {      
        Bid::findOrFail($id)->delete();
        session()->flash('status', 'Bid Item Removed Successful');
        return redirect()->route('myAccount');
    }
    public function cancelItem($id)
    {      
        $item =  Item::where('id',$id)->first();
        unlink('items/item/'.$item->image);
        $item->delete();
        session()->flash('status', 'Item Removed Successful');
        return redirect()->route('myAccount');
 
    }
    public function render()
    {
        $myBids = Bid::where('bidding_user_id', Auth::user()->id)->paginate(10);
        $items = Item::where('user_id',Auth::user()->id)->paginate(10);
        return view('livewire.my-account-component',['myBids'=>$myBids,'items'=>$items])->layout('layouts.base');
    }
}
