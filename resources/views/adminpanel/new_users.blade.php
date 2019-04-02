@extends('adminpanel/main')
@section('active4')
    class="active"
@stop
@section('title')
    New Users
@stop

@section('desc')
    Manage Your Users
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Users</h3>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" placeholder="Filter Pages...">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a class="btn btn-default" href="{{url('adminpanel/user')}}/{{$user->user_id}}">View Profile</a> </td>
                                <!--<td><a class="btn btn-default" href="{{url('activation-account/send-mail')}}/{{$user->user_id}}">Send Code</a> </td>-->
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop