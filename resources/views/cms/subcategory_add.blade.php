@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Add new subcategory'])


<div class="row">
    <div class="col-md-8 mb-5">
        <form action="{{url('cms/subcategories')}}" method='POST' novalidate='novalidate' autocomplete="off"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="link">Title</label>
                <input type="text" class='form-control origin-text' name="sub_title" id="sub_title"
                    value='{{old("sub_title")}}'>
                <span class="text-danger ">{{$errors->first('sub_title')}}</span>
            </div>
            <div class="form-group">
                <label for="main-category">Main Category</label>
                <select name="categorie_id" id="categorie-id" class='form-control origin-select'>
                    <option value="">Choose</option>
                    @foreach($categories as $i)

                    <option value="{{$i['id']}}">
                        {{$i['c_url']}}</option>
                    @endforeach
                </select>
                <span class="text-danger ">{{$errors->first('categorie_id')}}</span>

            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class='form-control target-text' name='s_url' id='s_url' value='{{old("s_url")}}'>
                <span class="text-danger">{{$errors->first('s_url')}}</span>
            </div>


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class='form-control target-text-name' name='sub_name' id='sub_name'
                    value='{{old("sub_name")}}'>
                <span class="text-danger">{{$errors->first('sub_name')}}</span>
            </div>


            <div class="form-group">
                <label for="image">Subcategory image</label>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" name='sub_img' class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <span class="text-danger">{{$errors->first('sub_img')}}</span>

            </div>

            <input type="submit" value="Save Subcategory" class="btn btn-dark" name="submit">
            <a href="{{url('cms/subcategories')}}" class='btn btn-light'>Cancel</a>
        </form>
    </div>
</div>

@endsection
