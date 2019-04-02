@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Testimonials</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('adminpanel/pages/our-clients/add')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>New Image</label>
                    <input type="file" class="form-control" name="file" placeholder="Additional Service Title" value="">
                </div>

                <input type="submit" class="btn btn-danger" value="Add">
            </form>
                <div class="row">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Image</th>
                            <th></th>

                        </tr>

                        @foreach($our_clients as $data)
                        <tr>
                            <td><img class="img-responsive clients-img" src="{{asset('assets/upload')}}/{{$data->image}}"></td>

                            <td>
                                <form action="{{url('adminpanel/pages/our-clients/delete')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>

                        @endforeach



                    </table>

                </div>


        </div>
    </div>
@stop