<!DOCTYPE html>
<html>
<head>
    <title>Online Learning System : KBTC College</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--stylesheets / link tags loaded here-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/darkly/bootstrap.min.css">
    <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
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
</head>
<body>
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
                                <form action="{{route('all_courses2')}}" method="post">
                                @csrf
                                  <input class="form-control" type="text" placeholder="Search.." name="search">
                                  <button type="submit" style="display: none;"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About us </a>
                        </li>
                        
                        <li>
                            <a class="nav-link" href="/student/login" > <span class="btn btn-outline-secondary">Login</span> </a>
                        </li>
                        <li>
                            <a class="nav-link" href="/student/signup" > <span class="btn btn-primary">Signup</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            
            
            <div class="container-mobile course1">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="single category">
                            <h3 class="side-title">Category</h3>
                            @isset($cate_count)
                            <ul class="list-unstyled">
                                <li><a href="/home/all-courses" title=""  class="text-primary">All Courses <span class="pull-right">{{$cate_count['count']}}</span></a></li>
                                <li><a href="/all-courses/1" title="">Software Engineering <span class="pull-right">{{$cate_count['SE']}}</span></a></li>
                                <li><a href="/all-courses/2" title="">Networking <span class="pull-right">{{$cate_count['Net']}}</span></a></li>
                                <li><a href="/all-courses/3" title="">Cyber Security <span class="pull-right">{{$cate_count['Cyber']}}</span></a></li>
                                <li><a href="/all-courses/4" title="">Embedded System <span class="pull-right">{{$cate_count['Emb']}}</span></a></li>
                                <li><a href="/all-courses/5" title="">Business IT <span class="pull-right">{{$cate_count['Bus']}}</span></a></li>
                                
                            </ul>
                            @endisset
                        </div>
                        <br>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                             @isset($courses)
                            <h4>All Courses</h4>
                            <div class="row">

                               
                                @foreach ($courses as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-thumbnail text-center">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="rating-star mb-4">
                                                        @if($course->avg==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        @elseif($course->avg==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @endif
                                                    </div>
                                                    <div class="product-price">{{number_format(($course->price)-($course->discount_price))}} Kyats
                                                        @if(($course->discount_price)!="")
                                                        <del class="product-del">{{$course->discount_price}} Kyats</del>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                                @isset($cate_course)
                                <h4>{{$cate}}</h4>
                                <div class="row">
                                @foreach($cate_course as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-thumbnail text-center">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="rating-star mb-4">
                                                        @if($course->avg==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        @elseif($course->avg==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @endif
                                                    </div>
                                                    <div class="product-price">{{number_format(($course->price)-($course->discount_price))}} Kyats
                                                        @if(($course->discount_price)!="")
                                                        <del class="product-del">{{$course->discount_price}} Kyats</del>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                                @isset($search_courses)
                                <h4>{{$name}}</h4>
                                <div class="row">
                                @foreach($search_courses as $course)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-thumbnail text-center">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="{{ $course->photo}}" alt="" class="img-fluid"></div>
                                               
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                    <h3 class="product-title">{{$course->cname}}</h3>
                                                    <p><em>Tr. {{$course->lecturer_name}}</em></p>
                                                    <div class="rating-star mb-4">
                                                        @if($course->avg==5)
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        @elseif($course->avg==4)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==3)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @elseif($course->avg==2)
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @else
                                                        
                                                        <i class="las la-star checked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        <i class="las la-star unchecked" ></i>
                                                        
                                                        @endif
                                                    </div>
                                                    <div class="product-price">{{number_format(($course->price)-($course->discount_price))}} Kyats
                                                        @if(($course->discount_price)!="")
                                                        <del class="product-del">{{$course->discount_price}} Kyats</del>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-btn">
                                                    @if($course->sid=='')
                                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#enrollModal_{{$course->id}}">Enroll Now</a>
                                                    @elseif($course->access==0)
                                                    <a href="" class="btn btn-light">Please Wait</a>
                                                    @else
                                                    <a href="/student/course-resource/{{$course->id}}" class="btn btn-secondary">Go to course</a>
                                                    @endif
                                                    <a href="/student/detail-course/{{$course->id}}" class="btn btn-outline-light">Details</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                            </div>
                        </div>
                </div>
                
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <main>
                        <section class="footer-ul">
                            <div >
                                <img class="logo-img" src="{{asset('/images/logo.png')}}">
                                <p></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                            </div>
                            <div>
                                <ul><h4>ADDRESS</h4>
                                    <li><span class="text-secondary">Compus 1 :</span> N0.60 , Sapalcahan 2 str , Hlaing , Yangon.</li>
                                    <LI><span class="text-secondary">Compus 2 :</span> N0.60 , Sapalcahan 2 str , Hlaing , Yangon.</LI>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3211.0726014327493!2d96.12818952277475!3d16.844682761644794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19560c91dc289%3A0x66ea7e9bd1976d49!2sKBTC%20Collage!5e0!3m2!1sen!2smm!4v1586578915554!5m2!1sen!2smm" width="200" height="100" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
    <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
    <!--scripts loaded here-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('/libs/js/carousel.js')}}"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
 