@extends('master')
@section('main-content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class='text-center'>{{$products[0]->sub_title}}</h1>

        </div>
    </div>

    <section class="ftco-section bg-light products">
        <div class="container-fluid">
            <div class=" row  d-md-none mb-5">
                <div class="col-4 text-center ">
                    <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">WOMEN</a>
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
                    <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">MEN</a>
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
                    <a class="dropdown-toggle text-dark" href="" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">KIDS</a>
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
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        @foreach($products as $i)
                        <div class="col-6  col-lg-4 col-xl-3 ftco-animate">
                            <div class="product">
                                <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}" class="img-prod"><img
                                        class="img-fluid" src="{{asset('images/'.$i->p_image)}}"
                                        alt="Colorlib Template">
                                    @if($i->discount)
                                    <span class="status">{{$i->discount}}% off</span>
                                    @endif
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 px-3">
                                    <h3><a
                                            href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}">{{$i->p_title}}</a>
                                    </h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            @if($i->full_price)
                                            <p class="price"><span class="mr-2 price-dc">{{$i->full_price}}
                                                    $</span></span>
                                            </p>
                                            @endif

                                            <p><span class="price-sale">{{$i->price}} $</p>
                                        </div><br>

                                        @if(!$i->full_price)
                                        <div class='height'>

                                        </div>
                                        @endif


                                    </div>
                                    <p class="bottom-area col-sm-12 d-flex px-3">
                                        @if(!Cart::get($i->id))
                                        <a href="{{url('shop/'.$i->c_url.'/'.$i->s_url.'/'.$i->p_url)}}"
                                            class="add-to-cart cart-add  text-center py-2 mr-1"><span>Quick
                                                View</span></a>
                                        @else
                                        <a class="add-to-cart text-center py-2 mr-1 pt-2"><span>In Cart
                                            </span></a>
                                        @endif

                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col">
                        <div class="row ">
                            <div class="mx-auto d-block pagination"> {{ $products->links()}}</div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">

                                <!--<ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 sidebar d-none d-md-block">

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
            </div>
        </div>
    </section>



</div>

@endsection
