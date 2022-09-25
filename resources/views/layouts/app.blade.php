<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>ঢাকাই বিরিয়ানি </title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href=" {{ asset('img/logo4.jpg') }} ">
    <link href=" {{ asset('backend/css/styles.css') }} " rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/themify-icons.css">
    <!-- Owl Carousel -->
    {{-- <link rel="stylesheet" href=" {{ asset('fontend') }}/css/owl-carousel.css"> --}}
    <!-- Slicknav -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/slicknav.min.css">
    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href= "{{ asset('fontend') }}/css/reset.css">
    <link rel="stylesheet" href= "{{ asset('fontend') }}/css/2elegant-icons.css">
    <link rel="stylesheet" href= "{{ asset('fontend') }}/css/2jquery-ui.min.css">

    
    <link rel="stylesheet" href=" {{ asset('fontend') }}/style.css">
    {{-- <link rel="stylesheet" href=" {{ asset('fontend') }}/css/style2.css"> --}}

    <link rel="stylesheet" href=" {{ asset('fontend') }}/css/responsive.css">
       

</head>
<body class="js" style="overflow-x:hidden;">
<!-- Header -->
<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}"><img  style="width: 130px;height:100px;margin-left:1rem"  src=" {{ asset('img/logo4.jpg') }} " alt="ঢাকাই বিরিয়ানি"></a>
                    </div>
                    <!--/ End Logo -->
                    
                    <!--/ Search Form -->
                    <div class="mobile-nav"></div>
                    
                </div>
                <div class="col-lg-9 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form action=" " method="get">
                                <input name="q" placeholder="Search Products Here....." type="search" value="">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-3 col-12">
                    <div class="right-bar">
                        
                        @php
                            $count = App\Models\Cart::all()->where('user_ip',request()->ip())->sum('qty');
                            $categories = App\Models\Category::get();
                        @endphp
                          {{-- cart section --}}
                        <div class="sinlge-bar shopping me-3">
                        <a href=" {{ url('cart') }} " class="single-icon pe-3"><i class="ti-bag"></i> <span class="total-count">{{ $count }}</span></a>
                            
                        </div>
                        <div>
                            <span></span>
                        </div>
                    </div>

                </div>
                @if(session('cart')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('cart') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area" >
                            <!-- Main Menu -->
                            {{-- style="backgroung-color:E9E41D !important;" --}}
                            <nav class="navbar navbar-expand-lg" >
                                <div class="navbar-collapse" style="backgroung-color:E9E41D !important;">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav" >
                                                @foreach($categories as $category)
                                                <li>
                                                    <a href=" ">
                                                        {{ $category->category_name }}
                                                    </a>
                                                </li>
                                                @endforeach
                                                        
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->

   

@yield('main_content')
    



<!-- Start Footer Area -->
<footer class="footer">
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p> Copyright © 2022 <span style="color:#f2a838;"> ঢাকাই বিরিয়ানি </span>All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                        <img src="{{ asset('fontend') }}/images/payments.png" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="{{ asset('fontend') }}/js/jquery.min.js"></script>
<script src="{{ asset('fontend') }}/js/jquery-ui.min.js"></script>
<script src="{{ asset('fontend') }}/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('fontend') }}/js/mixitup.min.js"></script>
<script src="{{ asset('fontend') }}/js/jquery.min.js"></script>

@yield('js_script')

<script src="{{ asset('fontend') }}/js/jquery-migrate-3.0.0.js"></script>
<!-- Popper JS -->
<script src="{{ asset('fontend') }}/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('fontend') }}/js/bootstrap.min.js"></script>
<!-- Slicknav JS -->
<script src="{{ asset('fontend') }}/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('fontend') }}/js/owl-carousel.js"></script>
<script src="{{ asset('fontend') }}/js/owl-carousel.min.js"></script>

<!-- ScrollUp JS -->
<script src="{{ asset('fontend') }}/js/scrollup.js"></script>
<script src="{{ asset('fontend') }}/js/main.js"></script>
<script src="{{ asset('fontend') }}/js/jquery-3.3.1.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('fontend') }}/js/active.js"></script>

</body>
</html>