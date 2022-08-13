<div>
         <!-- Contact Start -->
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
                <h2 class="section-title px-5"><span class="px-2">Post Service</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col-lg-12 mb-5">
                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" wire:submit.prevent="postService">
                            <div class="form-row">
    
                                <div class="form-group col-md-6">
                                  <label>Service Name</label>
                                  <input type="text" class="form-control"  wire:model="name" required>
                                </div>

                                <div class="form-group">
                                    <label>Service Category</label>
                                    <select wire:model="serviceCategory" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($serviceCategories as $serviceCategory)                                        
                                        <option value="{{$serviceCategory->id}}" >{{$serviceCategory->category_name}}</option>
                                        @endforeach       
                                    </select>
                                </div>
          
                                <div class="form-group col-md-6">
                                    <label>Rate per Hour</label>
                                    <input type="number" class="form-control" aria-label="Amount (to the nearest KSHs)" wire:model="rate" required>
                                </div>
        
                            </div>
                              
                            <button type="submit" class="btn btn-primary">Post Service</button>

                        </form>
                    </div>
                </div>
              
            </div>
        </div>
        <!-- Contact End -->
</div>
