<?php

namespace App\Http\Livewire;

use App\Models\Bid;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function makeBid($id)
    {
        if(Auth::check()){

            $bidStatus = Bid::where('item_id', $id)->where('bidding_user_id', Auth::user()->id);
            
            if($bidStatus->exists()){
                session()->flash('status', 'Bid Item already exist');
                return redirect()->route('home');
                
            }else{
                $makeBid = new Bid();
                $makeBid->item_id = $id;
                $posting = Item::findOrFail($id);
                $makeBid->posting_user_id = $posting->id;
                $makeBid->bidding_user_id = Auth::user()->id;
                $makeBid->save();
                session()->flash('status', 'Bid placed successful!');
                return redirect()->route('home');
            }
     
        }
        else{
            return redirect()->route('login');
        }
      
    }

    public function render()
    {
        $items = Item::paginate(12);
        return view('livewire.shop-component',['items'=>$items])->layout('layouts.base');
    }
}
