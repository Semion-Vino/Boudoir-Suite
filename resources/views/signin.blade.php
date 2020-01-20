@extends('master')
@section('main-content')
<section class='login'>
    <div class="container mx-auto mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="ml-auto wrapper">
                    <form action="" method="POST" autocomplete="off" novalidate='novalidate'>
                        @csrf()
                        <h2 class="text-center mb-5">Log In</h2>

                        <div class="form-group">


                            <label class='text-left '>Email address</label>
                            <input type="email" value="{{old('email')}}" class="form-control ml-auto" name="email"
                                id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <span class="text-danger">{{$errors->first('email')}}</span>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="Password" id="Password"
                                placeholder="Password">
                            <span class="text-danger">{{$errors->first('Password')}}</span>
                            @if(!empty($sign_error))
                            <span class='text-danger'>{{$sign_error}}</span>
                            @endif


                        </div>

                        <button type="submit" name='login' class="btn btn-primary mx-auto d-block mb-5">Log In</button>

                    </form>
                </div>

            </div>


            <div class="col-md-6">

                <div class="mr-auto wrapper">
                    @if(url()->previous()=='shop/cart')
                    <form action="{{ url('user/signup?rn=shop/cart') }}" method="POST" autocomplete="off"
                        novalidate='novalidate'>
                        @else
                        <form action="{{ url('user/signup') }}" method="POST" autocomplete="off"
                            novalidate='novalidate'>
                            @endif
                            @csrf()
                            <div class="form-group">

                                <h2 class="text-center mb-5 create">Create Account</h2>

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" name='firstName'
                                            value="{{old('firstName')}}" id="" placeholder="First Name">
                                        <span class="text-danger">{{$errors->first('firstName')}}</span>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" value="{{old('lastName')}}" name='lastName'
                                            class="form-control" id="" placeholder="Last Name">
                                        <span class="text-danger">{{$errors->first('lastName')}}</span>

                                    </div>

                                </div>
                                <label class='text-left '>Email address</label>
                                <input type="email" value="{{old('e-mail')}}" class="form-control ml-auto" name="e-mail"
                                    id="email2" aria-describedby="emailHelp" placeholder="Enter email">
                                <span class="text-danger">{{$errors->first('e-mail')}}</span>


                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="password-confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password-confirmation" placeholder="Password">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <select name="country" id="country" class='form-control'>
                                    <option value="">Choose country</option>
                                    @if($countries ?? '')
                                    @foreach($countries as $i)

                                    <option value="{{$i->name}}">{{$i->name}}</option>
                                    @endforeach
                                    @endif
                                    <span class="text-danger">{{$errors->first('country')}}</span>

                                </select>
                            </div>


                            <button type="submit" name='create' class="btn btn-primary mx-auto d-block ">Create
                                Account</button>

                        </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection
