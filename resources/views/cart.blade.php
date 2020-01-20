@extends('master')
@section('main-content')
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                @if($cart)
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cart as $i)
                            <tr class="text-center">
                                <td class="product-remove"><a href="{{url('shop/remove-item/'.$i['id'])}}"><i
                                            class="fas fa-trash-alt text-danger"></i></span></a></td>

                                <td class="image-prod">

                                    <div class="img"
                                        style="background-image:url({{asset('images/'.$i['attributes']['image'])}})">
                                    </div>


                                </td>

                                <td class="product-name">
                                    <h3>{{$i['name']}}</h3>

                                </td>
                                <td>
                                    {{strtoupper($i['attributes']['size'])}}
                                </td>

                                <td class="price">${{$i['price']}}</td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <a class='mt-3 mr-2 update-cart' data-op='minus' data-pid="{{$i['id']}}"
                                            href="">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <input size='1' type="text" name="quantity"
                                            class="quantity form-control input-number" value="{{$i['quantity']}}"
                                            min="1" max="100">
                                        <a class="ml-2 mt-3 update-cart" data-op='plus' data-pid="{{$i['id']}}" href="">
                                            <i class="fas fa-plus">
                                            </i>
                                        </a>
                                    </div>
                                </td>

                                <td class="total">{{$i['price']*$i['quantity']}}</td>
                            </tr><!-- END TR-->
                            @endforeach

                        </tbody>

                    </table>
                </div>

                <a class='btn btn-primary p-3 mt-4' data-toggle="modal" data-target="#modalRemoveAll">Clear Cart</a>







                <div class="row justify-content-center">
                    <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>${{Cart::getTotal()}}</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>$0.00</span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>$3.00</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>$17.60</span>
                            </p>
                        </div>
                        <p class="text-center"><a href="{{url('shop/checkout')}}"
                                class="btn btn-primary py-3 px-4">Proceed to
                                Checkout</a>
                        </p>
                    </div>
                </div>
                @else
                <h2 class='text-center'>Your cart is empty. <a href="{{url('')}}">Start shopping</a></h2>

                @endif
            </div>
        </div>
    </div>

</section>
@endsection

<!-------------------------------------------MODAL POP UP------------------------------------->


<div class="modal fade" id="modalRemoveAll" tabindex="-1" role="dialog" aria-labelledby="modalRemoveAll"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Remove all items from your cart?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <a href="{{url('shop/clear-cart')}}" type="button" class="btn btn-primary pl-4 pr-4">Yes</a>
                <a href="{{url('shop/clear-cart')}}" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
