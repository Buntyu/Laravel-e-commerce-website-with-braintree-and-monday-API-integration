@extends('adminpanel/main')
@section('active4')
    class="active"
@stop
@section('title')
    Users
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
                            <th>Joined</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Sam Tuirin</td>
                            <td>sam.tuirin@gmail.com</td>
                            <td>Dec 12, 2016</td>
                            <td><a class="btn btn-default" href="edit.html">View</a> <a class="btn btn-danger" href="#">Delete</a> </td>
                        </tr>
                        <tr>
                            <td>Sam Tuirin</td>
                            <td>sam.tuirin@gmail.com</td>
                            <td>Dec 12, 2016</td>
                            <td><a class="btn btn-default" href="edit.html">View</a> <a class="btn btn-danger" href="#">Delete</a> </td>
                        </tr>
                        <tr>
                            <td>Sam Tuirin</td>
                            <td>sam.tuirin@gmail.com</td>
                            <td>Dec 12, 2016</td>
                            <td><a class="btn btn-default" href="edit.html">View</a> <a class="btn btn-danger" href="#">Delete</a> </td>
                        </tr>
                        <tr>
                            <td>Sam Tuirin</td>
                            <td>sam.tuirin@gmail.com</td>
                            <td>Dec 12, 2016</td>
                            <td><a class="btn btn-default" href="edit.html">View</a> <a class="btn btn-danger" href="#">Delete</a> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop