@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Edit content'])


<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/content/'.$item['id'])}}" method='POST' novalidate='novalidate' autocomplete="off">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="menu_id">Menu Link</label>
                <select name="menu_id" id="menu-id" class='form-control'>

                    @foreach($menu as $i)

                    <option @if($item['menu_id']==$i['id']) selected='selected' @endif value="{{$i['id']}}">
                        {{$i['link']}}</option>
                    @endforeach
                </select>
                <span class="text-danger ">{{$errors->first('menu_id')}}</span>
                <br>
                <label for="menu_id" class='mt-4'>Title</label>
                <input type="text" class='form-control' name="title" id="title" value='{{$item["c_title"]}}'>
                <span class="text-danger mb-4">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="article">Article</label>
                <textarea name="article" id="article" class='form-control' cols="30"
                    rows="10">{{$item['article']}}</textarea>
                <span class="text-danger">{{$errors->first('article')}}</span>
                <br>

                <input type="submit" value="Update Content" class="btn btn-dark mt-4" name="submit">
                <a href="{{url('cms/content')}}" class='btn btn-light mt-4'>Cancel</a>
        </form>
    </div>
</div>

@endsection
