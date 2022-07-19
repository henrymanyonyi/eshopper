<div>
  <!-- Cart Start -->
  <div class="container-fluid pt-5">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong> {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    @endif
    
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Posted Posted</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Bids</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @if ($items->isNotEmpty())
                        <table class="table table-bordered text-center mb-0">
                                    <thead class="bg-secondary text-dark">
                                        <tr>
                                            <th>Image</th>
                                            <th>Item</th>
                                            <th>Preferred Item</th>
                                            <th>Date Posted</th>                                            
                                            <th>Remove Item</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    
                                        @foreach ($items as $item)

                                        <tr>
                                            <td class="align-middle"><img src="{{asset('items/item/'.$item->image)}}" alt="" style="width: 50px;"> </td>
                                            <td class="align-middle">{{$item->item_name}}</td>  
                                            <td class="align-middle">{{$item->preferred_item}}</td>                      
                                            <td class="align-middle">{{$item->created_at}}</td>                                            
                                            <td class="align-middle"><button wire:click.prevent="cancelItem({{$item->id}})" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                                        </tr>
                                            
                                        @endforeach                        

                                    </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-2">
                            {{$items->links()}}
                        </div>                        
                    @else
                        <p class="text-center mt-2">No items posted</p>
                    @endif
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if ($myBids->isNotEmpty())
                        <table class="table table-bordered text-center mb-0">
                                    <thead class="bg-secondary text-dark">
                                        <tr>
                                            <th>Image</th>
                                            <th>Item Name</th>
                                            <th>Preferred Item</th>
                                            <th>Posted By</th>
                                            <th>Bid Date</th>
                                            <th>Cancel Bid</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    
                                        @foreach ($myBids as $myBid)

                                        <tr>
                                            <td class="align-middle"><img src="{{asset('items/item')}}/{{$myBid->item->image}}" alt="" style="width: 50px;"></td>
                                            <td class="align-middle"> {{$myBid->item->item_name}}</td>
                                            <td class="align-middle">{{$myBid->item->preferred_item}}</td>
                                            <td class="align-middle">{{$myBid->postedBy->name}}</td>                        
                                            <td class="align-middle">{{$myBid->created_at}}</td>
                                            <td class="align-middle"><button wire:click.prevent="cancelBid({{$myBid->id}})" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                                        </tr>
                                            
                                        @endforeach                        

                                    </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-2">
                            {{$myBids->links()}}
                        </div>
                    @else
                        <p class="text-center mt-2">No Bid(s) Made</p>
                    @endif
                </div>
            </div>           
           
        </div>
      
    </div>
</div>
<!-- Cart End -->
</div>
