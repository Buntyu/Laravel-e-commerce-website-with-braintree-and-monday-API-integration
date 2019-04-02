@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">User Agreement</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('adminpanel/pages/user-agreement')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea class="form-control" id="faqEdit" name="content">@if(!empty($ua->content)){!! $ua->content !!}@endif</textarea>
                </div>
                <input type="submit" class="btn btn-danger" value="Add">
            </form>


        </div>
    </div>
@stop
@section('script-block')
    <script>
        CKEDITOR.replace( 'faqEdit' );
    </script>
@stop