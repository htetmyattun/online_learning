<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/line-awesome/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/line-awesome/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Online Learning System : KBTC</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/"><img src="{{ asset('/images/logo.png')}}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown connection">
                            <div id="custom-search" class="nav-link top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My courses </a>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About us </a>
                        </li>
                        
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="{{ asset('/images/avatar-2.jpg')}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="{{ asset('/images/avatar-3.jpg')}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="{{ asset('/images/avatar-4.jpg')}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="{{ asset('/images/avatar-5.jpg')}}" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/github.png')}}" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/dribbble.png')}}" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/dropbox.png')}}" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/bitbucket.png')}}" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/mail_chimp.png')}}" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="{{ asset('/images/slack.png')}}" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container course">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                                    <div class="product-slider">
                                        <div id="productslider-1" class="product-carousel carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="c-block" src="{{ asset('/images/c1.jpg')}}" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="c-block" src="{{ asset('/images/c2.jpg')}}" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="c-block" src="{{ asset('/images/c3.jpg')}}" alt="Third slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                             <span class="sr-only">Previous</span>
                                                  </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                 <span class="sr-only">Next</span>
                                                     </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                                    <div class="product-details">
                                        <div class="border-bottom pb-3 mb-3">
                                            <h2 class="mb-3">Course 1</h2>
                                            <p><em>Ms.Yamone Oo</em></p>
                                            <div class="product-rating d-inline-block float-right">
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star checked" ></i>
                                                <i class="las la-star" ></i>
                                            </div>
                                            <h3 class="mb-0 text-primary">$49.00 <del class="product-del">$69.00</del></h3>
                                        </div>
                                        
                                        <div class="product-description">
                                            <p class="text-danger">Start Date : 12/5/2020</p>
                                            <p class="text-info">Duration : 3 weeks</p>
                                            <p><span class="fa fa-play-circle"></span> 6 hrs 10 mins</p>
                                            <h4 class="mb-1">Descriptions</h4>
                                            <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                                            <a href="#" class="btn btn-primary btn-block btn-lg">Enroll</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                                    <div class="simple-card">
                                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Descriptions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reviews</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent5">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                                <h3>Course Brief</h3>
                                                <p>Praesent et cursus quam. Etiam vulputate est et metus pellentesque iaculis. Suspendisse nec urna augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubiliaurae.</p>
                                                <p>Nam condimentum erat aliquet rutrum fringilla. Suspendisse potenti. Vestibulum placerat elementum sollicitudin. Aliquam consequat molestie tortor, et dignissim quam blandit nec. Donec tincidunt dui libero, ac convallis urna dapibus eu. Praesent volutpat mi eget diam efficitur, a mollis quam ultricies. Morbi eu turpis odio.</p>
                                                <h3>Entry Requirements</h3>
                                                <ul class="list-unstyled arrow">
                                                    <li>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                    <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                                    <li>Donec at leo sed nisl vestibulum fermentum.
                                                    </li>
                                                </ul>
                                                <h3>Exam Infomation</h3>
                                                <p>Nam condimentum erat aliquet rutrum fringilla. Suspendisse potenti. Vestibulum placerat elementum sollicitudin. Aliquam consequat molestie tortor, et dignissim quam blandit nec. Donec tincidunt dui libero, ac convallis urna dapibus eu. Praesent volutpat mi eget diam efficitur, a mollis quam ultricies. Morbi eu turpis odio.</p>
                                                <h3>Careers</h3>
                                                <ul class="list-unstyled arrow">
                                                    <li>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                                    <li>Donec ut elit sodales, dignissim elit et, sollicitudin nulla.</li>
                                                    <li>Donec at leo sed nisl vestibulum fermentum.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                                <div class="review-block  border-top mt-3 pt-3">
                                                    <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star" ></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-10">
                                    <h3> Courses Recommanded for you</h3>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ asset('/images/c1.jpg')}}" alt="" class="img-fluid"></div>
                                            <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">Course 4</h3>
                                                <p>Ms.Yamone Oo</p>
                                                <div class="product-rating d-inline-block">
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star" ></i>
                                                </div>
                                                <div class="product-price">$49.00
                                                    <del class="product-del">$69.00</del>
                                                </div>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                                <a href="#" class="btn btn-outline-light">Details</a>
                                                <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ asset('/images/c2.jpg')}}" alt="" class="img-fluid"></div>
                                            <div class="ribbons"></div>
                                            <div class="ribbons-text">New</div>
                                            <div class=""><a href="#" class="product-wishlist-btn"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">Course 4</h3>
                                                <p>Ms.Yamone Oo</p>
                                                <div class="product-rating d-inline-block">
                                                    <fieldset class="rate">
                                                    <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
                                                    <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                                                    <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
                                                    <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                                                    <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
                                                    <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                                                    <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
                                                    <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                                                    <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
                                                    <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
                                                    <!-- <input type="radio" id="rating0" name="rating" value="0" /><label for="rating0" title="No star"></label> -->
                                                </fieldset>
                                                </div>
                                                <div class="product-price">$49.00
                                                    <del class="product-del">$69.00</del>
                                                </div>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                                <a href="#" class="btn btn-outline-light">Details</a>
                                                <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ asset('/images/c3.jpg')}}" alt="" class="img-fluid"></div>
                                            
                                            <div class=""><a href="#" class="product-wishlist-btn active"><i class="fas fa-heart"></i></a></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">Course 4</h3>
                                                <p>Ms.Yamone Oo</p>
                                                <div class="product-rating d-inline-block">
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star checked" ></i>
                                                    <i class="las la-star" ></i>
                                                </div>
                                                <div class="product-price">$49.00
                                                    <del class="product-del">$69.00</del>
                                                </div>
                                            </div>
                                            <div class="product-btn">
                                                <a href="#" class="btn btn-primary">Enroll Now</a>
                                                <a href="#" class="btn btn-outline-light">Details</a>
                                                <a href="#" class="btn btn-outline-light"><i class="fa fa-share"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            
        </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <main>
                        <section>
                            <img src="{{asset('/images/logo.png')}}">
                        </section>
                        <section class="footer-ul">
                            <div>
                                <ul><h4>ADDRESS</h4>
                                    <li>Compus 1 : N0.60 , Sapalcahan 2 str , Hlaing , Yangon.</li>
                                    <LI>Compus 2 : N0.60 , Sapalcahan 2 str , Hlaing , Yangon.</LI>
                                </ul>
                            </div>
                            <div>
                                <ul><h4>CONTACT</h4>
                                    <li><span class="fa fa-phone"></span>  09 111 111 111</li>
                                    <li><i class="las la-envelope-open-text"></i>  info@kbtc.edu.mm </li>
                                    <br> 
                                    <a href="https://www.facebook.com/kbtc.edu.mm/"><i class="lab la-facebook" style="font-size: 40px;color:#3b5998;"></i></a>
                                    <a href="https://www.linkedin.com/company/kbtc-college/"><i class="lab la-linkedin" style="font-size: 40px;color:#0e76a8;"></i></a>
                                </ul>
                            </div>
                        </section>
                    </main>
                    <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2020 Concept. All rights reserved. Dashboard by <a href="">Knowledge Lab Software Solution</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
      
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{ asset('/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{ asset('/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{ asset('/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{ asset('/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ asset('/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{ asset('/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{ asset('/libs/js/dashboard-ecommerce.js')}}"></script>
</body>
 
</html>