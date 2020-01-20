    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Boudoir Suite | {{$page_title ?? ''}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:600|Tangerine&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('css/myStyle.css')}}">
        <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">

        <script>
            var BASE_URL = "{{url('')}}/"

        </script>
    </head>

    <body class="goto-here">
        <!-- <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{url('')}}">Boudoir
                    Suite</a>
                <a href="{{url('shop/cart')}}" id='cart-num' class="nav-link text-light float-right disp-none"><span
                        class="icon-shopping_cart"></span>{{Cart::getTotalQuantity()}}</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu</button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">WOMEN</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @if(!empty($sub_categories))
                                @foreach($sub_categories as $i)
                                @if($i['categorie_id']==1)
                                <a class="dropdown-item"
                                    href="{{url('shop/'.$categories[0]['c_url'].'/'.$i['s_url'])}}">


                                    {{$i['sub_title']}}
                                    @endif
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">MEN</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @if(!empty($sub_categories))
                                @foreach($sub_categories as $i)
                                @if($i['categorie_id']==2)
                                <a class="dropdown-item"
                                    href="{{url('shop/'.$categories[1]['c_url'].'/'.$i['s_url'])}}">

                                    {{$i['sub_title']}}
                                    @endif
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">KIDS</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @if(!empty($sub_categories))
                                @foreach($sub_categories as $i)
                                @if($i['categorie_id']==3)
                                <a class="dropdown-item"
                                    href="{{url('shop/'.$categories[2]['c_url'].'/'.$i['s_url'])}}">

                                    {{$i['sub_title']}}
                                    @endif
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                    </ul>
                    <form action="{{ url('search') }}" method="GET" autocomplete="off" novalidate='novalidate'>
                        <div class="form-row align-items-center">
                            <input class="search-input" id='search-input' name='search' type="text">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn btn-primary"
                                    id="basic-addon2">search</button>
                            </div>
                            <li class='mr-3 ml-3 nav-elements' id='search'> <a href="" class='text-body'>
                                    <i class="fas fa-search"></i></a>
                            </li>
                        </div>
                    </form>

                    @if(!Session::has('user_id'))
                    <li class='mr-3 ml-3 nav-elements'> <a href="{{url('user/signin')}}" class='text-body'> <i
                                class="fas fa-user"></i></a></li>
                    @else
                    <li class='mr-3 ml-3 nav-elements text-dark'> <i class="fas fa-user mr-2"></i>
                        {{ucfirst(Session::get('user_name'))}}</li>
                    @if(Session::has('is_admin'))
                    <li class='mr-3 ml-3 nav-elements'> <a href="{{url('cms/dashboard')}}" class='text-body'>Admin
                            Panel</a></li>
                    @endif
                    <li class='mr-3 ml-3 nav-elements'> <a href="{{url('user/logout')}}" class='text-body'>Logout</a>
                    </li>
                    @endif
                    <li class=" ml-3 cta cta-colored cart-icon nav-elements"> <a href="{{url('shop/cart')}}"><span
                                class="icon-shopping_cart"></span>[{{Cart::getTotalQuantity()}}]</a></li>

                </div>

            </div>
        </nav>
        <!-- END nav -->

        @yield('main-content')
        <footer class="ftco-footer bg-light ftco-section">
            <div class="container">
                <div class="row">
                    <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">

                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2">Menu</h2>
                            <ul class="list-unstyled">
                                <li><a href="{{url('shop/women/dresses')}}" class="py-2 d-block">Shop</a></li>
                                @if(!empty($menu))
                                @foreach($menu as $i)
                                <li><a href="{{url('info/'.$i['url'])}}" class="py-2 d-block">{{$i['link']}}</a>
                                </li>
                                @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Help</h2>
                            <div class="d-flex">
                                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                    <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                    <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                    <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                    <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>

                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+972
                                                545872365</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span
                                                class="text">contact@boudoir.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved | This template is made with <i
                                class="icon-heart color-danger" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00" /></svg></div>


        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/aos.js')}}"></script>
        <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/scrollax.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>

    </html>
