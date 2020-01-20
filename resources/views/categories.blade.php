@extends('master')
@section('main-content')
<div class="section">
    <div class="container">
        <div class="row">
            @if($categories)
            @foreach($categories as $i)
            <div class="col-lg-4">
                <a href="{{url('shop/'.$i['c_url'])}}"><img style='width:400px;height:450px;border-radius:25px'
                        class=' p-3' src="{{asset('images/'.$i['c_image'])}}" alt=""></a>
                <a href="{{url('shop/'.$i['c_url'])}}" style='margin-left:10rem;'>
                    {{ucfirst($i['c_title'])}}</a>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <p>No categories to show</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
