<!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/student/home"><img src="{{ asset('/images/logo.png')}}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown connection">
                            <div id="custom-search" class="nav-link top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="/student/myclass" id="navbarDropdown" > My Classroom </a>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown"> About us </a>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a href="" class="nav-link" data-toggle="modal" data-target="#paymentModal">Payment</a>
                        </li>
                        
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#wishlistModal">
                                <i class="fas fa-heart pink "></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset(Auth::user()->profile)}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{Auth::user()->name}}</h5>
                                </div>
                                <a class="dropdown-item" href="/student/profile"><i class="fas fa-user mr-2"></i>Profile</a>
                                <a class="dropdown-item" href="/student/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Payments</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-12" style="margin-bottom: 1rem;">
                                    <h3>KBZ Pay ဖြင့်ငွေပေးသွင်းရန်</h3>
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('images/kbzpay.png')}}" width="100px" height="100px">
                                </div>
                                <div class="col-4"><h4>Account  No : 111111</h4></div>
                                <div class="col-4">
                                    <img src="{{asset('images/kbzpayqr.png')}} " width="100px" height="100px">
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-12" style="margin-bottom: 1rem;">
                                    <h3>Wave Money ဖြင့်ငွေပေးသွင်းရန်</h3>
                                </div>
                                <div class="col-4">
                                    <img src="{{asset('images/wavemoney.png')}}" width="100px" height="100px">
                                </div>
                                <div class="col-4"><h4>Account  No : 111111</h4></div>
                                <div class="col-4">
                                    <img src="{{asset('images/kbzpayqr.png')}} " width="100px" height="100px">
                                </div>
                            </div>
                        </div>
                      
                        <div class="modal-body text-center">
                            <h3 class="text-center">Mobile Banking မှာတစ်ဆင့်ငွေလွှဲရန်</h3>
                            <div class="row">
                                <div class="col-3 text-dark">
                                    <p><strong>KBZ Account </strong> </p>
                                </div>
                                <div class="col-1">|</div>
                                <div class="col-2">Name</div>
                                <div class="col-1">|</div>
                                <div class="col-5">123 223 332 222 1111</div>

                                <div class="col-3 text-dark">
                                    <p><strong>AYA Account </strong> </p>
                                </div>
                                <div class="col-1">|</div>
                                <div class="col-2">Name</div>
                                <div class="col-1">|</div>
                                <div class="col-5">123 223 332 222 1111</div>

                                <div class="col-3 text-dark">
                                    <p><strong>CB Account </strong> </p>
                                </div>
                                <div class="col-1">|</div>
                                <div class="col-2">Name</div>
                                <div class="col-1">|</div>
                                <div class="col-5">123 223 332 222 1111</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Your Wishlist</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item-1 social-sales-content">
                                        <img src="{{asset('images/kbzpay.png')}}" width="50px" height="50px">
                                        <span class="social-sales-name text-dark">
                                            <strong>Course 1 </strong><br>
                                        ($49.00)</span>
                                        <span class="social-sales-count text-dark">
                                            <a href="" class="btn btn-secondary">Enroll</a>
                                            <a href="" class="btn btn-light">Detail</a>
                                            <a href=""> <i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item-1 social-sales-content">
                                        <img src="{{asset('images/kbzpay.png')}}" width="50px" height="50px">
                                        <span class="social-sales-name text-dark">
                                            <strong>Course 1 </strong><br>
                                        ($49.00)</span>
                                        <span class="social-sales-count text-dark">
                                            <a href="" class="btn btn-secondary">Enroll</a>
                                            <a href="" class="btn btn-light">Detail</a>
                                            <a href=""> <i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                    <li class="list-group-item-1 social-sales-content">
                                        <img src="{{asset('images/kbzpay.png')}}" width="50px" height="50px">
                                        <span class="social-sales-name text-dark">
                                            <strong>Course 1 </strong><br>
                                        ($49.00)</span>
                                        <span class="social-sales-count text-dark">
                                            <a href="" class="btn btn-secondary">Enroll</a>
                                            <a href="" class="btn btn-light">Detail</a>
                                            <a href=""> <i class="far fa-trash-alt"></i></a>
                                        </span>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->