@extends('master')
@section('main-content')



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                <form action="" method="POST" class='billing-form' autocomplete="off" novalidate='novalidate'>
                    @csrf()
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstName" class="form-control" placeholder=""
                                    value='{{$bill_info->firstName}}'>
                                <span class="text-danger">{{$errors->first('firstName')}}</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastName" class="form-control"
                                    value='{{$bill_info->lastName}}'>
                                <span class="text-danger">{{$errors->first('lastName')}}</span>

                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">State / Country</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="country" id="" class="form-control">
                                        <option value='{{$bill_info->lastName}}'>{{$bill_info->country}}
                                        </option>
                                        @if($countries ?? '')
                                        @foreach($countries as $i)

                                        <option value="{{$i->name}}">{{$i->name}}</option>
                                        @endforeach
                                        @endif
                                        <span class="text-danger">{{$errors->first('country')}}</span>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" name="street" value='{{$bill_info->street ?? old("street")}}'
                                    class="form-control" placeholder="House number and street name">
                                <span class="text-danger">{{$errors->first('street')}}</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="apartment" class="form-control"
                                    value='{{$bill_info->apartment ?? old("apartment")}}'
                                    placeholder="Appartment, suite, unit etc">
                                <span class="text-danger">{{$errors->first('apartment')}}</span>

                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" name="city" class="form-control" placeholder=""
                                    value='{{$bill_info->city ?? old("city")}}'>
                                <span class="text-danger">{{$errors->first('city')}}</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" name="zip" placeholder=""
                                    value='{{$bill_info->zip ?? old("zip")}}'>
                                <span class="text-danger">{{$errors->first('zip')}}</span>

                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    value='{{$bill_info->phone ?? old("phone")}}' placeholder="">
                                <span class="text-danger">{{$errors->first('phone')}}</span>

                            </div>


                            <div class="w-100"></div>

                        </div>
                        <!-- END -->



                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>${{$total}}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>$30.00</span>
                                    </p>

                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>${{$total + 30}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <select name="payment" class='form-control mb-3' id="">
                                        <option value="bank">Direct bank transfer</option>
                                        <option value="paypal">Paypal</option>
                                    </select>
                                    <span class="text-danger">{{$errors->first('payment')}}</span>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name='terms' value="" class="mr-2"> I have
                                                    read and accept the
                                                    terms and conditions</label>


                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary py-3 px-4" value="Place an order"
                                        name='submit'>


                                </div>
                            </div>
                        </div>
                </form>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
@endsection
