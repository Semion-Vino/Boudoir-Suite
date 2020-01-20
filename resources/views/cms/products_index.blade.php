@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Products'])


<div class="row">
    <div class="col">
        <a href="{{url('cms/products/create')}}" class='btn btn-primary'><i class="fas fa-plus-circle"></i> Add a
            Product</a>
    </div>
</div>
<div class="col">
    <div class="row">
        <table class='table table-bordered mt-4'>
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Sizes</th>
                    <th>Product Image</th>
                    <th>Last Update</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $i)
                <tr>

                    <td>{{$i->p_title}}</td>
                    <td>
                        <ul>


                            <li>XS: <b class='ml-1 {{!$i->xs==1?"text-danger":""}}'>{{$i->xs}}</b></li>
                            <li>S:<b class='ml-3 {{!$i->s==1?"text-danger":""}}'>{{$i->s}}</b></li>
                            <li>M:<b class='ml-2 {{!$i->m==1?"text-danger":""}}'>{{$i->m}}</b></li>
                            <li>L:<b class='ml-3 {{!$i->l==1?"text-danger":""}}'>{{$i->l}}</b></li>
                            <li>XL:<b class='ml-2 {{!$i->xl==1?"text-danger":""}}'>{{$i->xl}}</b></li>




                        </ul>
                    </td>
                    <td> <img width="100px" src="{{asset('images/'.$i->p_image)}}" alt=""></td>
                    <td>{{date('d/m/y',strtotime($i->updated_at))}}</td>
                    <td>
                        <a href="{{url('cms/products/'.$i->id.'/edit')}}"><i class="far fa-edit"></i>Edit</a>
                        |
                        <a href="{{url('cms/products/'.$i->id)}}"><i class="fas fa-eraser"></i>Delete</a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto d-block "> {{ $products->links()}}</div>

    </div>
</div>

@endsection
