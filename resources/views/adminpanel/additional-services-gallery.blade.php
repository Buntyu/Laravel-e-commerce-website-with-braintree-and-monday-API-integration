@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Additional Services Gallery</h3>
        </div>
        <div class="panel-body">

            @foreach($additional_services as $data)
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('adminpanel/pages/additional-services-gallery/edit')}}" method="post">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Additional Service Title" value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Additional Service Description">{{$data->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>New Image</label>
                                <input type="file" class="form-control" name="file" placeholder="Additional Service Title" value="">
                            </div>
                            <img src="{{asset('assets/upload') . '/' . $data->image}}">
                            <br><br>

                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="submit" class="btn btn-danger" name="edit" value="Edit">
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach


        </div>
    </div>
@stop