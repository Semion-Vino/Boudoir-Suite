@extends('master')
@section('main-content')
<div class="container">
    <div class="row">
        @if($content)
        @foreach($content as $i)
        <div class="col">
            <h3>{{$i->c_title}}</h3>
            <p>{!!$i->article!!}</p>
        </div>
        @endforeach
        @else
        <div class="col">
            <p>No content available</p>
        </div>
        @endif
    </div>
</div>
@endsection
