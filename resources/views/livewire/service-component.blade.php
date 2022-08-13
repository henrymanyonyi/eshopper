<div>
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

                        @foreach ($serviceCategories as $serviceCategory)
                         <a href="" class="nav-item nav-link">{{$serviceCategory->category_name}}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Posted By</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>1000.00</td>
                        <td>+254702449576</td>
                      </tr>                      
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$serviceCategories->links()}}
            </div>
        </div>
        
    </div>
    <!-- Navbar End -->
</div>
