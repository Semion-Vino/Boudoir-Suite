@php
$menu=App\Menu::all()->toArray();
$categories = App\Categorie::all()->toArray();
$sub_categories = App\SubCategory::all()->toArray();
@endphp
@extends('master')
@section('main-content')
<div class="container">
    <img id='img-404' class='mx-auto d-block' src="{{asset('images/oops.png')}}" alt="">
    <h1 class='text-center mt-5 text-secondary'>The page you're looking for is not found</h1>

</div>
@endsection
