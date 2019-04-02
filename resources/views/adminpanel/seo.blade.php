@extends('adminpanel/main')

@section('title')
    Pages
@stop

@section('desc')
    Manage Your Pages
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Pages</h3>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page->title}}</td>
                                <td><a class="btn btn-default" href="{{url('adminpanel/pages/seo')}}/{{$page->id}}">Edit</a></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
@stop