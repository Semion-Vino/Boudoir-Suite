@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Menu'])


<div class="row">
    <div class="col">
        <a href="{{url('cms/menu/create')}}" class='btn btn-primary'><i class="fas fa-plus-circle"></i> Add Menu
            Link</a>
    </div>
</div>
<div class="col">
    <div class="row">
        <table class='table table-bordered mt-4'>
            <thead>
                <tr>
                    <th>Menu Link</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu as $i)
                <tr>
                    <td>{{$i['link']}}</td>
                    <td>
                        <a href="{{url('cms/menu/'.$i['id'].'/edit')}}"><i class="far fa-edit"></i>Edit</a>
                        |
                        <a href="{{url('cms/menu/'.$i['id'])}}"><i class="fas fa-eraser"></i>Delete</a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
