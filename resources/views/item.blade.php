@extends('master')
@section('main-content')
<section class="ftco-section item mt-5">
    <div class="container-fluid">
        <div class=" row  d-lg-none mb-5">
            <div class="col-4 text-center ">
                <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">WOMEN</a>
                <div class="dropdown-menu dropdown-sub text-center" aria-labelledby="dropdown04">
                    @if(!empty($sub_categories))
                    @foreach($sub_categories as $i)
                    @if($i['categorie_id']==1)
                    <a class="dropdown-item" href="{{url('shop/'.$categories[0]['c_url'].'/'.$i['s_url'])}}">
                        {{$i['sub_title']}}
                        @endif
                    </a>
                    @endforeach
                    @endif
                </div>

            </div>
            <div class="col-4 text-center">
                <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">MEN</a>
                <div class="dropdown-menu dropdown-sub text-center" aria-labelledby="dropdown04">
                    @if(!empty($sub_categories))
                    @foreach($sub_categories as $i)
                    @if($i['categorie_id']==2)
                    <a class="dropdown-item" href="{{url('shop/'.$categories[0]['c_url'].'/'.$i['s_url'])}}">
                        {{$i['sub_title']}}
                        @endif
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-4 text-center">
                <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">KIDS</a>
                <div class="dropdown-menu dropdown-sub text-center" aria-labelledby="dropdown04">
                    @if(!empty($sub_categories))
                    @foreach($sub_categories as $i)
                    @if($i['categorie_id']==3)
                    <a class="dropdown-item" href="{{url('shop/'.$categories[0]['c_url'].'/'.$i['s_url'])}}">
                        {{$i['sub_title']}}
                        @endif
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-2 sidebar d-none d-lg-block">

                <div class="sidebar-box-2">

                    <h2 class="heading mb-4"><a href="#">Women</a></h2>
                    <hr>
                    <ul>
                        @if(!empty($sub_categories))
                        @foreach($sub_categories as $i)
                        @if($i['categorie_id']==1)
                        <a class='text-dark sidenav-sub'
                            href="{{url('shop/'.$categories[1]['c_url'].'/'.$i['s_url'])}}">
                            <li>{{$i['sub_title']}}</li>
                        </a>
                        @endif

                        @endforeach
                        @endif


                    </ul>
                </div>

                <div class="sidebar-box-2">

                    <h2 class="heading mb-4"><a href="#">Men</a></h2>
                    <hr>
                    <ul>
                        @if(!empty($sub_categories))
                        @foreach($sub_categories as $i)
                        @if($i['categorie_id']==2)
                        <a class='text-dark sidenav-sub'
                            href="{{url('shop/'.$categories[1]['c_url'].'/'.$i['s_url'])}}">
                            <li>{{$i['sub_title']}}</li>
                        </a>
                        @endif

                        @endforeach
                        @endif


                    </ul>
                </div>
                <div class="sidebar-box-2">

                    <h2 class="heading mb-4"><a href="#">Kids</a></h2>
                    <hr>
                    <ul>
                        @if(!empty($sub_categories))
                        @foreach($sub_categories as $i)
                        @if($i['categorie_id']==3)
                        <a class='text-dark sidenav-sub'
                            href="{{url('shop/'.$categories[1]['c_url'].'/'.$i['s_url'])}}">
                            <li>{{$i['sub_title']}}</li>
                        </a>
                        @endif

                        @endforeach
                        @endif


                    </ul>
                </div>
                </ul>
            </div>
            <div class="col-md-5 mb-5 ftco-animate">
                <a><img src="{{asset('images/'.$item['p_image'])}}" class="item-img mx-auto d-block"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-md-5 product-details pl-md-5 ftco-animate">
                <h3>{{ucwords($item['p_title'])}}</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="text-danger choose-size ">Please select your size</span>

                        <div class="form-group d-flex ">

                            @if($item['xs'])
                            <div class="size clickable" data-size='xs'>XS</div>
                            @else
                            <div class="size" style='background-image: url({{asset("images/x.png")}});'>XS
                            </div>
                            @endif

                            @if($item['s'])
                            <div class="size one-letter clickable" data-size='s'>S</div>
                            @else
                            <div class="size one-letter" style='background-image: url({{asset("images/x.png")}});'>S
                            </div>
                            @endif

                            @if($item['m'])
                            <div class="size m-size clickable" data-size='m'>M</div>
                            @else
                            <div class="size m-size" style='background-image: url({{asset("images/x.png")}});'>M
                            </div>
                            @endif

                            @if($item['l'])
                            <div class="size one-letter clickable" data-size='l'>L</div>
                            @else
                            <div class="size one-letter" style='background-image: url({{asset("images/x.png")}});'>L
                            </div>
                            @endif

                            @if($item['xl'])
                            <div class="size clickable" data-size='xl'>XL</div>
                            @else
                            <div class="size" style='background-image: url({{asset("images/x.png")}});'>XL
                            </div>
                            @endif

                        </div>
                    </div>


                </div>

                <p>
                    {!!$item['p_article']!!}
                </p>
                <div class="input-group col-xl-6 col-lg-8 col-sm-6 col-xs-6 d-flex mb-3">
                    <span class="input-group-btn mr-2">
                        <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                            <i class="ion-ios-remove"></i>
                        </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1"
                        data-quantity='' max="100">

                    <span class="input-group-btn ml-2">
                        <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                            <i class="ion-ios-add"></i>
                        </button>
                    </span>
                </div>
                <p class="price"><span>{{$item['price']}}$</span></p>


                @if(!Cart::get($item['id']))
                <a data-pid="{{$item['id']}}" class="btn btn-black py-3 px-5 cart-add text-white">Add to
                    Cart</a>
                @else
                <a class="btn btn-black py-3 px-5 ">In Cart</a>
                @endif
                @if(Session::has('is_admin'))
                <a class="btn btn-black py-3 px-5 " href="{{url('cms/products/'.$item['id'].'/edit')}}">Edit Product</a>

                @endif
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Ralated Products</h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            @foreach($rel_prod as $i)

            <div class="col-sm-6 col-md-6 col-lg ftco-animate">
                <div class="product">
                    <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" class="img-prod"><img
                            class="img-fluid" src="{{asset('images/'.$i->p_image)}}" alt="Colorlib Template">
                        @if($i->discount)
                        <span class="status">{{$i->discount}}% off</span>
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
                            <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}"
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
@endsection
