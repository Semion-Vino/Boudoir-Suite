@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Content'])


<div class="row">
    <div class="col">
        <a href="{{url('cms/content/create')}}" class='btn btn-primary'><i class="fas fa-plus-circle"></i> Add
            Content</a>
    </div>
</div>
<div class="col">
    <div class="row">
        <table class='table table-bordered mt-4'>
            <thead>
                <tr>
                    <th>Content Title</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $i)
                <tr>
                    <td>{{$i['c_title']}}</td>
                    <td>
                        <a href="{{url('cms/content/'.$i['id'].'/edit')}}"><i class="far fa-edit"></i>Edit</a>
                        |
                        <a href="{{url('cms/content/'.$i['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
