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

    public $offerPrice;
    public $offerItem;
    public $selectedItem;

    public function selectedItem($itemId)
    {
        $this->selectedItem = $itemId;
    }
    public function makeOffer()
    {               
        if (Auth::check()) {
            $offerStatus = Bid::where('item_id', $this->selectedItem)->where('bidding_user_id', Auth::user()->id)->first();        
            if($offerStatus){
                session()->flash('status', 'You already made your offer for this item');
                return redirect()->route('shop');
            }else{
                $posting = Item::findOrFail($this->selectedItem);
                if ($posting->user_id == Auth::user()->id) {
                    # code...
                    session()->flash('status', 'You cannot bid for the item you posted');
                } else {
                    # code...
                    $offer = new Bid();
                    $offer->item_id = $this->selectedItem;                    
                    $offer->posting_user_id = $posting->user_id;
                    $offer->bidding_user_id = Auth::user()->id;
                    $offer->item_offer = $this->offerItem;
                    $offer->price_offer = $this->offerPrice;
                    $offer->save();
                    session()->flash('status', 'Your offer was placed successfully!');
                    return redirect()->route('shop');
                } 
            }

        } else {
            return redirect()->route('login');
        }
        
    }

    public function makeBid($id)
    {
        if(Auth::check()){

            $bidStatus = Bid::where('item_id', $id)->where('bidding_user_id', Auth::user()->id);
            
            if($bidStatus->exists()){
                session()->flash('status', 'Bid Item already exist');
                return redirect()->route('shop');
                
            }else{
                $posting = Item::findOrFail($id);
                if ($posting->user_id == Auth::user()->id) {
                    # code...
                    session()->flash('status', 'Cannot Bid for your item this Item');
                } else {
                    # code...
                    $makeBid = new Bid();
                    $makeBid->item_id = $id;                    
                    $makeBid->posting_user_id = $posting->user_id;
                    $makeBid->bidding_user_id = Auth::user()->id;
                    $makeBid->save();
                    session()->flash('status', 'Bid placed successful!');
                    return redirect()->route('shop');
                }
                
            
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
