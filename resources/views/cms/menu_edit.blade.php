@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Edit menu link'])


<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/menu/'.$item['id'])}}" method='POST' novalidate='novalidate' autocomplete="off">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" name='item_id' value="{{$item['id']}}">
            <div class="form-group">
                <label for="link">Link</label>
                @php $link_val=!empty(old('link')) ? old('link') : $item['link'];@endphp
                <input type="text" class='form-control origin-text' name="link" id="link" value='{{$link_val}}'>
                <span class="text-danger ">{{$errors->first('link')}}</span>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                @php $url_val=!empty(old('url')) ? old('url') : $item['url'];@endphp

                <input type="text" class='form-control target-text' name='url' id='url' value='{{$url_val}}'>
                <span class="text-danger">{{$errors->first('url')}}</span>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                @php $title_val=!empty(old('title')) ? old('title') : $item['title'];@endphp

                <input type="text" class='form-control' name='title' id='title' value='{{$title_val}}'>
                <span class="text-danger">{{$errors->first('title')}}</span>
            </div>


            <input type="submit" value="Update Menu" class="btn btn-dark" name="submit">
            <a href="{{url('cms/menu')}}" class='btn btn-light'>Cancel</a>
        </form>
    </div>
</div>

@endsection
