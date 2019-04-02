@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Page Edit</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('adminpanel/pages/seo/')}}/{{$page->id}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$page->title}}">
                </div>
                <div class="form-group">
                    <label>Keywords</label>
                    <textarea class="form-control" name="keywords">{{$page->keywords}}</textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{$page->description}}</textarea>
                </div>
                <input type="submit" class="btn btn-danger" value="Edit">
            </form>
        </div>
    </div>
@stop
@section('script-block')
    <!--<script>
        CKEDITOR.replace( 'faqEdit' );
    </script>-->
@stop