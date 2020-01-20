@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Subcategories'])


<div class="row">
    <div class="col">
        <a href="{{url('cms/subcategories/create')}}" class='btn btn-primary'><i class="fas fa-plus-circle"></i> Add a
            subcategory</a>
    </div>
</div>
<div class="col">
    <div class="row">
        <table class='table table-bordered mt-4'>
            <thead>
                <tr>
                    <th>Subcategory Title</th>

                    <th>Last Update</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $i)
                <tr>

                    <td>{{$i['sub_name']}}
                        <img class='ml-5' src="{{asset('images/'.$i['sub_img'])}}" alt=""></td>
                    <td>{{date('d/m/y',strtotime($i['updated_at']))}}</td>
                    <td>
                        <a href="{{url('cms/subcategories/'.$i['id'].'/edit')}}"><i class="far fa-edit"></i>Edit</a>
                        |
                        <a href="{{url('cms/subcategories/'.$i['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
