@extends('cms.cmsMaster')

@section('cms-content')
@include('utils.cmsHeader',['title'=>'Orders'])


<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td>Name: {{$i->firstName.' '.$i->lastName }} <br>
                        Country: {{$i->country}} <br>
                        City: {{$i->city}} <br>
                        Street: {{$i->street.' '.$i->apartment}} <br>
                        ZIP: {{$i->zip}} <br>
                        Phone: {{$i->phone}}
                    </td>
                    <td>
                        <ul>
                            @foreach(unserialize($i->data) as $x)
                            <li>
                                {{$x['name']}} <b>|</b>
                                Quantity:{{$x['quantity']}} <b>|</b>
                                Price: {{$x['price']}}$ <b>|</b>Size: <b
                                    class='text-danger'>{{strtoupper($x['attributes']['size'])}}</b>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$i->total}}</td>
                    <td>{{date('d/m/Y H:i:s',strtotime($i->created_at))}}</td>
                    <td class='text-center'><a href="{{url('cms/deleteorder/'.$i->id)}}"><i
                                class="fas fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class='btn btn-dark text-white p-3 mt-4' data-toggle="modal" data-target="#modalRemoveAll">Delete all</a>
    </div>
</div>

@endsection
<div class="modal fade" id="modalRemoveAll" tabindex="-1" role="dialog" aria-labelledby="modalRemoveAll"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Remove all orders?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <a href="{{url('cms/deleteallorders')}}" type="button" class="btn btn-dark pl-4 pr-4">Yes</a>
                <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
