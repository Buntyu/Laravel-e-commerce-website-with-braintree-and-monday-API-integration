@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit Artworks</h3>
        </div>
        <div class="panel-body">

            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Artworks Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Artworks Title" value="{{$artwork->title}}">
                </div>
                <div class="form-group">
                    <label>Styles</label>
                    <select name="style" class="form-control">
                        <option @if($artwork->style == 'Fine Art') selected @endif value="Fine Art">Fine Art</option>
                        <option @if($artwork->style == 'Abstract') selected @endif value="Abstract">Abstract</option>
                        <option @if($artwork->style == 'Impressionism') selected @endif value="Impressionism">Impressionism</option>
                        <option @if($artwork->style == 'Street art') selected @endif value="Street art">Art Deco</option>
                        <option @if($artwork->style == 'Street art') selected @endif value="Street art">Street art</option>
                        <option @if($artwork->style == 'Illustration') selected @endif value="Illustration">Illustration</option>
                        <option @if($artwork->style == 'Contemporary') selected @endif value="Contemporary">Contemporary</option>
                        <option @if($artwork->style == 'Photography') selected @endif value="Photography">Photography</option>
                        <option @if($artwork->style == 'Mixed media') selected @endif value="Mixed media">Mixed media</option>
                        <option @if($artwork->style == 'Minimalism') selected @endif value="Minimalism">Minimalism</option>
                        <option @if($artwork->style == 'Pop art') selected @endif value="Pop art">Pop art</option>
                        <option @if($artwork->style == 'Collage') selected @endif value="Collage">Collage</option>
                        <option @if($artwork->style == 'Digital') selected @endif value="Digital">Digital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" class="form-control">
                        <option @if($artwork->subject == 'Portrait') selected @endif value="Portrait">Portrait</option>
                        <option @if($artwork->subject == 'Landscape') selected @endif value="Landscape">Landscape</option>
                        <option @if($artwork->subject == 'Still life') selected @endif value="Still life">Still life</option>
                        <option @if($artwork->subject == 'Nature') selected @endif value="Nature">Nature</option>
                        <option @if($artwork->subject == 'Beach') selected @endif value="Beach">Beach</option>
                        <option @if($artwork->subject == 'Animal') selected @endif value="Animal">Animal</option>
                        <option @if($artwork->subject == 'Architecture') selected @endif value="Architecture">Architecture</option>
                        <option @if($artwork->subject == 'B+W') selected @endif value="B+W">B+W</option>
                        <option @if($artwork->subject == 'City') selected @endif value="City">City</option>
                        <option @if($artwork->subject == 'Fashion') selected @endif value="Fashion">Fashion</option>
                        <option @if($artwork->subject == 'Landmarks') selected @endif value="Landmarks">Landmarks</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail" src="{{asset('assets/upload')}}/{{$artwork->image}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Original size</label>
                    <input type="text" class="form-control" name="size" value="{{$artwork->size}}">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{$artwork->price}}">
                </div>

                <div class="form-group">
                    <label>S</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->size_s}}" name="size_s" placeholder="Size S">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->price_s}}" name="price_s" placeholder="Price S">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->border_price_s}}" name="border_price_s" placeholder="Border Price S">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>M</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->size_m}}" name="size_m" placeholder="Size M">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->price_m}}" name="price_m" placeholder="Price M">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->border_price_m}}" name="border_price_m" placeholder="Border Price M">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>L</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->size_l}}" name="size_l" placeholder="Size L">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->price_l}}" name="price_l" placeholder="Price L">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->border_price_l}}" name="border_price_l" placeholder="Border Price L">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>XL</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->size_xl}}" name="size_xl" placeholder="Size XL">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->price_xl}}" name="price_xl" placeholder="Price XL">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" value="{{$artwork->border_price_xl}}" name="border_price_xl" placeholder="Border Price XL">
                        </div>
                    </div>

                </div>
                <input type="submit" class="btn btn-default" value="Save">
            </form>
            <form action="{{url('adminpanel/artworks/delete/')}}" method="post" style="float: right">
                {{csrf_field()}}
                <input type="hidden" name="id_a" value="{{$artwork->id}}">
                <input type="hidden" name="user_id" value="{{$artwork->user_id}}">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
@stop