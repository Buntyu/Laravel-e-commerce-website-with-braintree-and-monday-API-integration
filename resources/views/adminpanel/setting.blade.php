@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit Setting</h3>
        </div>
        <div class="panel-body">

            <form action="{{url('adminpanel/setting')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Website Name</label>
                    <input type="text" class="form-control" name="website_title" placeholder="Page Title" value="{{$setting->website_title}}">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{$setting->phone_number}}">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{$setting->email}}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{$setting->address}}">
                </div>
                <div class="form-group">
                    <label>Copyright</label>
                    <input type="text" class="form-control" name="copyright" placeholder="Page Title" value="{{$setting->copyright}}">
                </div>
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder="Page Title" value="{{$setting->facebook}}">
                </div>
                <div class="form-group">
                    <label>Google+</label>
                    <input type="text" class="form-control" name="google" placeholder="Page Title" value="{{$setting->google}}">
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="instagram" placeholder="Page Title" value="{{$setting->instagram}}">
                </div>
                <div class="form-group" style="display: none">
                    <label>Discount Title</label>
                    <input type="text" class="form-control" name="discount_title" placeholder="Page Title" value="{{$setting->discount_title}}">
                </div>
                <div class="form-group" style="display: none">
                    <label>Discount Value</label>
                    <input type="text" class="form-control" name="discount_value" placeholder="Page Title" value="{{$setting->discount_value}}">
                </div>
                <div class="form-group" style="display: none">
                    <label>Border Price</label>
                    <input type="text" class="form-control" name="border_price" placeholder="Border Price" value="{{$setting->border_price}}">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="published" type="checkbox" checked> Published Website
                    </label>
                </div>
                <div class="form-group">
                    <label>Discount Value</label>
                    @if(!empty($setting->logo))
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-thumbnail" src="{{asset('assets/upload')}}/{{$setting->logo}}">
                        </div>
                    </div>
                    @endif
                    <input type="file" class="form-control" name="file" placeholder="Select Logo" value="">
                </div>
                <input type="submit" class="btn btn-danger" value="Save">
            </form>
        </div>
    </div>
@stop