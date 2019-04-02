@extends('adminpanel/main')
@section('active5')
    class="active"
@stop
@section('title')
    New Artworks
@stop

@section('desc')
    Manage Your Gallery
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">New Artworks</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID ARTWORKS</th>
                    <th>NAME</th>
                    <th></th>
                </tr>
                @foreach($new_artworks as $new_artwork)
                    <tr>
                        <td>{{$new_artwork->id}}</td>
                        <td>{{$new_artwork->image}}</td>
                        <td><a class="btn btn-default" href="{{url('adminpanel/new-artworks/')}}/{{$new_artwork->id}}">View</a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop