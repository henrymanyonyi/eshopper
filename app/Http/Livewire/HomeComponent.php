<?php

namespace App\Http\Livewire;

use App\Models\Bid;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
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
                return redirect()->route('home');
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
                    return redirect()->route('home');
                } 
            }

        } else {
            return redirect()->route('login');
        }
        
    }

    public function makeBid($id)
    {
        if(Auth::check()){
            $bidStatus = Bid::where('item_id', $id)->where('bidding_user_id', Auth::user()->id)->first();

            if($bidStatus ){
                session()->flash('status', 'Bid Item already exist');
                return redirect()->route('home');
                
            }else{

                $posting = Item::findOrFail($id);
                if ($posting->user_id == Auth::user()->id) {
                    # code...
                    session()->flash('status', 'You cannot bid for the item you posted');
                } else {
                    # code...
                    $makeBid = new Bid();
                    $makeBid->item_id = $id;                    
                    $makeBid->posting_user_id = $posting->user_id;
                    $makeBid->bidding_user_id = Auth::user()->id;
                    $makeBid->save();
                    session()->flash('status', 'Bid placed successfully!');
                    return redirect()->route('home');
                }        
            }
     
        }
        else{
            return redirect()->route('login');
        }
      
    }
   
    
    public function render()
    {
        $items = Item::orderBy('created_at', 'DESC')->limit(8)->get();
        return view('livewire.home-component', ['items'=>$items])->layout('layouts.base');
    }
}
