@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit Setting</h3>
        </div>
        <div class="panel-body">

            <form action="" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail" src="{{asset('assets/upload')}}/{{$artworks->image}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Original size</label>
                    <input type="text" class="form-control" name="size" value="{{$artworks->size}}">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{$artworks->price}}">
                </div>
                <div class="form-group">
                    <label>Desired Price</label>
                    <div class="row">
                        <div class="col-md-3">
                            L <input type="text" required="" class="form-control" value="{{$artworks->desired_price_l}}"  placeholder="Desired Price L">
                        </div>
                        <div class="col-md-3">
                            M <input type="text" required="" class="form-control" value="{{$artworks->desired_price_m}}"  placeholder="Desired Price M">
                        </div>
                        <div class="col-md-3">
                            S <input type="text" required="" class="form-control" value="{{$artworks->desired_price_s}}"  placeholder="Desired Price S">
                        </div>
                        <div class="col-md-3">
                            XL <input type="text" required="" class="form-control" value="{{$artworks->desired_price_xl}}" placeholder="Desired Price XL">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>S</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="size_s" placeholder="Size S">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="price_s" placeholder="Price S">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="border_price_s" placeholder="Border Price S">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>M</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="size_m" placeholder="Size M">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="price_m" placeholder="Price M">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="border_price_m" placeholder="Border Price M">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>L</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="size_l" placeholder="Size L">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="price_l" placeholder="Price L">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="border_price_l" placeholder="Border Price L">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>XL</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="size_xl" placeholder="Size XL">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="price_xl" placeholder="Price XL">
                        </div>
                        <div class="col-md-3">
                            <input type="text" required="" class="form-control" name="border_price_xl" placeholder="Border Price XL">
                        </div>
                    </div>

                </div>
                <input type="submit" class="btn btn-danger" value="Save">
            </form>
        </div>
    </div>
@stop