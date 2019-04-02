@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Testimonials Print Your Own</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('adminpanel/pages/testimonials/add')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Testimonials Title" value="">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Testimonials Placeholder"></textarea>
                </div>

                <input type="submit" class="btn btn-danger" value="Add">
            </form>
            @foreach($testimonials as $data)
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$data->title}}</h2>
                        <p>{{$data->description}} </p>
                        <form action="{{url('adminpanel/pages/testimonials/delete')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach


        </div>
    </div>
@stop