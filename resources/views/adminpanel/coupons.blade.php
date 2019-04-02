@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Coupons</h3>
        </div>
        <div class="panel-body">
            <form action="{{url('adminpanel/pages/coupon/add')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="coupon_title" placeholder="Coupon Title" value="">
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input type="text" class="form-control" name="coupon_value" placeholder="Coupon Value" value="">
                </div>

                <input type="submit" class="btn btn-danger" value="Add">
            </form>
            @foreach($coupons as $data)
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$data->coupon_title}}</h2>
                        <p>{{$data->coupon_value}} </p>
                        <form action="{{url('adminpanel/pages/coupon/delete')}}" method="post">
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