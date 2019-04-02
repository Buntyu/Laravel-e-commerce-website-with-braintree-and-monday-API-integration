@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Border Price</h3>
        </div>
        <div class="panel-body">

            <div class="row">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th></th>

                    </tr>


                        <tr>
                            <td>Raw</td>
                            <td>${{$raw->border_price}}</td>

                            <td>
                                <form action="{{url('adminpanel/pages/our-clients/delete')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$raw->id}}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>

                    <tr>
                        <td>White</td>
                        <td>${{$white->border_price}}</td>

                        <td>
                            <form action="{{url('adminpanel/pages/our-clients/delete')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$white->id}}">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td>Black</td>
                        <td>${{$black->border_price}}</td>

                        <td>
                            <form action="{{url('adminpanel/pages/our-clients/delete')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$black->id}}">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>







                </table>

            </div>


        </div>
    </div>
@stop