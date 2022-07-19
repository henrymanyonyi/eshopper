<div>


    <!-- Products Start -->
    <div class="container-fluid pt-5">
      
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
         

            @foreach ($items as $item)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{asset('items/item')}}/{{$item->image}}" alt="" style="    height: 278px;
                        object-fit: cover;">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$item->item_name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Preferred item</h6>
                        </div>
                        <h6 class="text-truncate mb-3">{{$item->preferred_item}}</h6>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <button  wire:click.prevent="makeBid({{$item->id}})" class="btn btn-sm text-dark p-0 "><i class="fas fa-shopping-cart text-primary mr-1"></i>Bid Item</button>
                    </div>
                </div>
            </div>
            @endforeach
      
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{route('shop')}}" class="btn btn-light py-2 px-3 bg-dark text-light">Shop Now</a>
        </div>
    </div>
    <!-- Products End -->

</div>
