@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Delete Category'])


<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/subcategories/'.$item_id)}}" method='POST'>
            @csrf
            {{method_field('DELETE')}}
            <h4>Are you sure you want to delete this item?</h4>
            <input type="submit" value="Delete" class="btn btn-danger" name="submit">
            <a href="{{url('cms/subcategories')}}" class='btn btn-light'>Cancel</a>
        </form>
    </div>
</div>

@endsection