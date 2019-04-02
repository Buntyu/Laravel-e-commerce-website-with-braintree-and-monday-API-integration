@extends('adminpanel/main')
@section('active6')
    class="active"
@stop
@section('title')
    All Users
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

                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th></th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->name != 'admin')
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a class="btn btn-default" href="{{url('adminpanel/all-users/profile')}}/{{$user->user_id}}">View</a> </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop