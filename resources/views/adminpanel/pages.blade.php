@extends('adminpanel/main')
@section('active2')
    class="active"
@stop
@section('title')
    Pages info
@stop

@section('desc')
    Manage Your Pages
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Page Info</h3>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Testimonials-Print Your Own</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/testimonials')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>Testimonials-Commercial Printing</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/testimonials-commercial-printing')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>Additional Services - Print Yout Own</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/additional-services')}}">Edit</a></td>
                        </tr>

                        <tr>
                            <td>Additional Services - Gallery</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/additional-services-gallery')}}">Edit</a></td>
                        </tr>

                        <tr>
                            <td>Additional Services - Commercial Printing</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/additional-services-commercial-printing')}}">Edit</a></td>
                        </tr>

                        <tr>
                            <td>Sizes</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/sizes')}}">Edit</a></td>
                        </tr>

                        <tr>
                            <td>Our Clients</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/our-clients')}}">Edit</a></td>
                        </tr>

                        <tr>
                            <td>Discount Coupon</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/coupon')}}">Edit</a></td>
                        </tr>


                        <tr>
                            <td>FAQs For Artists</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/faq-for-artist')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>FAQs For Users</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/faq-for-users')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>Terms and conditions</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/terms')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>User Agreement</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/user-agreement')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>Shipping policy</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/shipping')}}">Edit</a></td>
                        </tr>
                        <tr>
                            <td>SEO</td>
                            <td><a class="btn btn-default" href="{{url('adminpanel/pages/seo')}}">Edit</a></td>
                        </tr>


                    </table>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
@stop