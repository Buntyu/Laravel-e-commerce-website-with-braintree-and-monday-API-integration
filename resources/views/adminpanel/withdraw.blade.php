@extends('adminpanel/main')
@section('active7')
    class="active"
@stop
@section('title')
    Withdraws
@stop

@section('desc')
    Manage Your Withdraws
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Withdraws</h3>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">

                <div class="panel-body">
                    @if(count($withdraw) != 0)

                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Amount for withdrawal</th>
                                <th>Date of request</th>
                                <th></th>
                            </tr>
                            @foreach($withdraw as $item)
                                <tr>
                                    <td>{{$item->sum}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><a class="btn btn-default" href="{{url('/adminpanel/withdraw/details')}}/{{$item->id}}">Details</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h3>Withdraw Not Found</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop