@extends('adminpanel/main')
@section('active3')
    class="active"
@stop
@section('title')
    Orders
@stop

@section('desc')
    Manage Your Orders
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Orders</h3>
    </div>
    <div class="panel-body">

        <div class="panel panel-default">
            <!--<div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="Data start...">
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="Data end...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control">
                            <option selected>All</option>
                            <option>New</option>
                            <option>Success</option>
                            <option>Failed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="text" placeholder="Price...">
                    </div>
                </div>

            </div>-->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID ORDERS</th>
                        <th>STATUS</th>
                        <th>FULLNAME</th>
                        <th>COUNT</th>
                        <th>PRICE</th>
                        <th>DATE</th>
                        <th></th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->name}}</td>
                            <td></td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/orders/')}}/{{$order->id}}">View</a> <a class="btn btn-danger" href="#">Delete</a> </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="panel-footer">
                <nav aria-label="Page navigation" class="pag-nav">
                    {{$orders->render()}}

                </nav>
            </div>
        </div>
    </div>
</div>
    @stop