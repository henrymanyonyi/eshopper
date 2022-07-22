<div>
         <!-- Contact Start -->
         <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Post Service</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col-lg-12 mb-5">
                    <div class="contact-form">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" wire:submit.prevent = "store">
                            <div class="form-row">
    
                                <div class="form-group col-md-6">
                                  <label>Service Name</label>
                                  <input type="text" class="form-control"  wire:model="name" required>
                                </div>
    
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Preferred Item/Service</label>
                                  <input type="text" class="form-control" id="inputPassword4" wire:model="preferred" required>
                                </div>
    
                            </div>
    
                            {{-- <div class="form-group">
                                <label for="inputAddress">Item Image</label>
                                <input type="file" class="form-control" id="inputAddress" placeholder="1234 Main St" wire:model="image" required>
                                @if ($image)
                                Photo Preview:
                                <img src="{{ $image->temporaryUrl() }}" height="50px">
                                @endif
                            </div> --}}
    
                              <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>
        <!-- Contact End -->
</div>