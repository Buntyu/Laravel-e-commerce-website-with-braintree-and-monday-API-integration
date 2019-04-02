@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">FAQs for Artist</h3>
        </div>
        <div class="panel-body">
            @forelse($faq as $item)
                <form action="{{url('adminpanel/pages/faq-for-artist/delete')}}/{{$item->id}}" method="post">
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                <form action="{{url('adminpanel/pages/faq-for-artist')}}/{{$item->id}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$item->title}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description">{!! $item->description !!}</textarea>
                    </div>
                    <input type="submit" class="btn btn-danger" value="Edit">
                </form>

                <br>
                <hr>
                <br>
            @empty

            @endforelse
            <form action="{{url('adminpanel/pages/faq-for-artist')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="faqEdit" name="description"></textarea>
                </div>
                <input type="submit" class="btn btn-danger" value="Add">
            </form>


        </div>
    </div>
@stop
@section('script-block')
    <!--<script>
        CKEDITOR.replace( 'faqEdit' );
    </script>-->
@stop