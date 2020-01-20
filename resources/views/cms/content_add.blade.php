@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Add new content'])


<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/content')}}" method='POST' novalidate='novalidate' autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="menu_id">Menu Link</label>
                <select name="menu_id" id="menu-id" class='form-control'>
                    <option value="">Choose</option>

                    @foreach($menu as $i)


                    <option @if(old('menu_id')==$i['id']) selected=selected @endif value="{{$i['id']}}">
                        {{$i['link']}}</option>
                    @endforeach
                </select>
                <span class="text-danger ">{{$errors->first('menu_id')}}</span>
                <br>
                <label for="menu_id" class='mt-4'>Title</label>
                <input type="text" class='form-control' name="title" id="title" value='{{old("title")}}'>
                <span class="text-danger mb-4">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="article">Article</label>
                <textarea name="article" id="article" class='form-control' cols="30"
                    rows="10">{{old('article')}}</textarea>
                <span class="text-danger">{{$errors->first('article')}}</span>
            </div>


            <input type="submit" value="Save Content" class="btn btn-dark mb-5" name="submit">
            <a href="{{url('cms/content')}}" class='btn btn-light mb-5'>Cancel</a>
        </form>
    </div>
</div>

@endsection
