@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Edit product'])


<div class="row">
    <div class="col-md-8 mb-5">
        <form action="{{url('cms/products/'.$item['id'])}}" method='POST' novalidate='novalidate' autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" name='item_id' value="{{$item['id']}}">

            <div class="form-group">
                <label for="link">Title</label>
                <input type="text" class='form-control origin-text' name="p_title" id="sub_title"
                    value='{{$item["p_title"]}}'>
                <span class="text-danger ">{{$errors->first('p_title')}}</span>
            </div>
            <div class="form-group">
                <label for="main-category">Main Category</label>
                <select name="categorie_id" id="categorie-id" class='form-control'>
                    <option value="">Choose</option>
                    @foreach($categories as $i)

                    <option value="{{$i['id']}}" @if($item['categorie_id']==$i['id']) selected='selected' @endif>
                        {{$i['c_url']}}</option>
                    @endforeach
                </select>
                <span class="text-danger ">{{$errors->first('categorie_id')}}</span>

            </div>

            <div class="form-group">
                <label for="subcategory">SubCategory</label>
                <select name="subcategorie_id" id="subcategorie-id" class='form-control'>
                    <option value="">Choose</option>
                    @foreach($sub_categories as $i)

                    <option value="{{$i['id']}}" @if($item['subcategorie_id']==$i['id']) selected='selected' @endif>
                        {{$i['sub_title']}}</option>
                    @endforeach
                </select>
                <span class="text-danger ">{{$errors->first('subcategorie_id')}}</span>

            </div>


            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class='form-control target-text' name='p_url' id='p_url' value='{{$item["p_url"]}}'>
                <span class="text-danger">{{$errors->first('p_url')}}</span>
            </div>


            <div class="form-group">
                <label for="name">Article</label>
                <textarea class='form-control' name="p_article" id="p-article" cols="30"
                    rows="10">{{$item["p_article"]}}</textarea>
                <span class="text-danger">{{$errors->first('p_article')}}</span>
            </div>


            <div class="form-group">
                <label for="url">Full Price</label>
                <input type="number" class='form-control' name='full_price' id='fullPrice'
                    value='{{$item["full_price"]}}'>

            </div>

            <div class="form-group">
                <label for="url">Price</label>
                <input type="number" class='form-control' name='price' id='price' value='{{$item["price"]}}'>
                <span class="text-danger">{{$errors->first('price')}}</span>
            </div>

            <div class="form-group">
                <label for="url">Discount (%)</label>
                <input type="number" class='form-control' name='discount' id='discount' value='{{$item["discount"]}}'>

            </div>
            <hr>
            <div class="form-group">
                <label for="size">Available sizes:</label><br>
                <input type="checkbox" {{$item['xs']?'checked':''}} name="xs" value="1">XS <br>
                <input type="checkbox" {{$item['s']?'checked':''}} name="s" value="1">S <br>
                <input type="checkbox" {{$item['m']?'checked':''}} name="m" value="1">M <br>
                <input type="checkbox" {{$item['l']?'checked':''}} name="l" value="1">L <br>
                <input type="checkbox" {{$item['xl']?'checked':''}} name="xl" value="1">XL <br>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Image</label>
                <p>
                    <img width='150px' src="{{asset('images/'.$item['p_image'])}}" alt="">
                </p>
            </div>

            <div class="form-group">
                <label for="image">Change image</label>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" onchange="jQuery(this).next('label').text(this.value);" name='p_image'
                            class="custom-file-input" id="image">
                        <label class="custom-file-label text-dark" for="image">Choose file</label>
                    </div>
                </div>
                <span class="text-danger">{{$errors->first('p_image')}}</span>

            </div>

            <input type="submit" value="Save & back" class="btn btn-dark" name="submit">
            <input type="submit" value="Save & to item page" class="btn btn-dark" name="submit2">
            <a href="{{url('cms/products')}}" class='btn btn-light'>Cancel</a>
        </form>
    </div>
</div>

@endsection
