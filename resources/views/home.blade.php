@extends('master')
@section('main-content')
<section id="home-section" class="hero">
    <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                    data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight"
                        style="background-image:url(images/bg_1.jpg);">
                    </div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Boudoir Suite</span>
                            <div class="horizontal">

                                <h1 class="mb-4 mt-3">Men 2019 <br><span>Winter Collection</span></h1>
                                <p class='black'> <b>WINTER IS COMING.</b><br> Check out the hottest designs for 2019!
                                </p>

                                <p><a href="{{url('shop/men/jackets')}}" class="btn btn-primary px-5 py-3 mt-3">Discover
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                    data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight"
                        style="background-image:url(lib/winkel/images/bg_2.jpg);">
                    </div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text text2">
                            <span class="subheading">Boudoir Suite</span>
                            <div class="horizontal">

                                <h1 class="mb-4 mt-3"><span>SALE SALE SALE!</span> <br>
                                    <span class='black'> Up to <span>60%</span> off!</span></h1>
                                <p class='black'><b>SALE ALERT!</b> Up to 60% off on all women products!</p>

                                <p><a href="{{url('shop/women/overalls')}}" class="btn btn-primary px-5 py-3 mt-3">Shop
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Best Sellers</h2>
                <p>The hottest picks that are selling like crazy!</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($rand_prod as $i)

            <div class="col-sm-6 col-md-6 col-lg ftco-animate">
                <div class="product">
                    <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" class="img-prod"><img
                            class="img-fluid" src="{{asset('images/'.$i->p_image)}}" alt="Colorlib Template">
                        @if($i->discount)
                        <span class="status">{{$i->discount}}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 px-3">
                        <h3><a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}">{{$i->p_title}}</a>
                        </h3>
                        <div class="d-flex">
                            <div class="pricing">

                                <p class="price">
                                    @if($i->full_price)
                                    <span class="mr-2 price-dc">${{$i->full_price}}</span>
                                    @endif
                                    <span class="price-sale">${{$i->price}}</span></p>
                            </div>

                        </div>
                        <p class="bottom-area d-flex px-3">
                            @if(!Cart::get($i->id))
                            <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" data-pid="{{$i->id}}"
                                class="add-to-cart cart-add text-center py-2 mr-1"><span>Quick View</span></a>
                            @else
                            <a class="add-to-cart text-center py-2 mr-1">In Cart</a>
                            @endif


                        </p>
                    </div>
                </div>
            </div>


            @endforeach

        </div>
    </div>
</section>

<section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt ftco-animate">
    <div class="features-box mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-box-item first-box">
                                <img src="lib/winkel/images/f-box-1.jpg" alt="">
                                <div class="box-text">
                                    <span class="trend-year">2019 Party</span>
                                    <h2>Jewelery</h2>
                                    <span class="trend-alert">Trend Allert</span>
                                    <a href="{{url('shop/women/jewelery')}}" class="btn btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-box-item second-box">
                                <img src="lib/winkel/images/f-box-2.jpg" alt="">
                                <div class="box-text">
                                    <span class="trend-year">2019 Trend</span>
                                    <h2>Footwear</h2>
                                    <span class="trend-alert">Bold & Black</span><br>
                                    <a href="{{url('shop/women/footwear')}}" class="btn btn-primary">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 classForPadding">
                    <div class="single-box-item large-box">
                        <img src="lib/winkel/images/f-box-3.jpg" alt="">
                        <div class="box-text">
                            <span class="trend-year">2019 Party</span>
                            <h2>Collection</h2>
                            <div class="trend-alert">Trend Allert</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Products</h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($rand_prod2 as $i)

            <div class="col-sm-6 col-md-6 col-lg ftco-animate">
                <div class="product">
                    <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" class="img-prod"><img
                            class="img-fluid" src="{{asset('images/'.$i->p_image)}}" alt="Colorlib Template">
                        @if($i->discount)
                        <span class="status">{{$i->discount}}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 px-3">
                        <h3><a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}">{{$i->p_title}}</a>
                        </h3>
                        <div class="d-flex">
                            <div class="pricing">

                                <p class="price">
                                    @if($i->full_price)
                                    <span class="mr-2 price-dc">${{$i->full_price}}</span>
                                    @endif
                                    <span class="price-sale">${{$i->price}}</span></p>
                            </div>

                        </div>
                        <p class="bottom-area d-flex px-3">
                            @if(!Cart::get($i->id))
                            <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" data-pid="{{$i->id}}"
                                class="add-to-cart cart-add text-center py-2 mr-1"><span>Quick View</span></a>
                            @else
                            <a class="add-to-cart text-center py-2 mr-1">In Cart</a>
                            @endif


                        </p>
                    </div>
                </div>
            </div>


            @endforeach





        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url(lib/winkel/images/bg_4.jpg);">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <span class='customers'>More than</span>
                                <strong class="number" data-number="10000">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <span class='customers'>Over</span>
                                <strong class="number" data-number="1000">0</strong>
                                <span>Deigner clothes</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Partners</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="11">0</strong>
                                <span>Awards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
