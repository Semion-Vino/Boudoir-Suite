@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Add new menu link'])


<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/menu')}}" method='POST' novalidate='novalidate' autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class='form-control origin-text' name="link" id="link" value='{{old("link")}}'>
                <span class="text-danger ">{{$errors->first('link')}}</span>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class='form-control target-text' name='url' id='url' value='{{old("url")}}'>
                <span class="text-danger">{{$errors->first('url')}}</span>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class='form-control' name='title' id='title' value='{{old("title")}}'>
                <span class="text-danger">{{$errors->first('title')}}</span>
            </div>


            <input type="submit" value="Save Menu" class="btn btn-dark" name="submit">
            <a href="{{url('cms/menu')}}" class='btn btn-light'>Cancel</a>
        </form>
    </div>
</div>

@endsection
