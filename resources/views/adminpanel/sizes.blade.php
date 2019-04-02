@extends('adminpanel.main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Sizes</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10"><h2 class="h2-title">Photo</h2></div>
                <div class="col-md-2"><button type="submit" form="photo" class="btn btn-danger">Save</button> <button type="button" data-form="photo" class="btn btn-danger"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></div>
            </div>
            <form id="photo" method="post" action="{{url('adminpanel/pages/size/edit')}}">
                {{csrf_field()}}
                <input type="hidden" name="type" value="photo">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Border Price</th>
                    </tr>
                    @foreach($photo as $data_photo)
                        <tr>
                            <td>
                                <select name="title[]" class="form-control">
                                    @if($data_photo->unit == "in centimeters")
                                        <option value="in centimeters">in centimeters</option>
                                        <option value="in inches">in inches</option>
                                            @else

                                            <option value="in inches">in inches</option>
                                            <option value="in centimeters">in centimeters</option>
                                    @endif
                                </select>
                            </td>
                            <td><input type="text" name="first_size[]" class="form-control" value="{{$data_photo->first_size}}" placeholder="first value">  <input type="text" name="second_size[]" class="form-control" value="{{$data_photo->second_size}}" placeholder="second value">  <input type="text" name="unit_size[]" class="form-control" value="{{$data_photo->unit_size}}" placeholder="unit value"></td>
                            <td><input type="text" name="price[]" class="form-control" value="{{$data_photo->price}}" placeholder="price"></td>
                            <td><input type="text" name="border_price[]" class="form-control" value="{{$data_photo->border_price}}" placeholder="border price"></td>
                        </tr>
                    @endforeach


                </table>
            </form>

            <div class="row">
                <div class="col-md-10"><h2 class="h2-title">Square</h2></div>
                <div class="col-md-2"><button type="submit" form="square" class="btn btn-danger">Save</button> <button type="button" data-form="square" class="btn btn-danger"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></div>
            </div>
            <form id="square" method="post" action="{{url('adminpanel/pages/size/edit')}}">
                {{csrf_field()}}
                <input type="hidden" name="type" value="square">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Border Price</th>
                    </tr>
                    @foreach($square as $data_square)
                        <tr>
                            <td>
                                <select name="title[]" class="form-control">
                                    @if($data_square->unit == "in centimeters")
                                        <option value="in centimeters">in centimeters</option>
                                        <option value="in inches">in inches</option>
                                    @else

                                        <option value="in inches">in inches</option>
                                        <option value="in centimeters">in centimeters</option>
                                    @endif
                                </select>
                            </td>
                            <td><input type="text" name="first_size[]" class="form-control" value="{{$data_square->first_size}}" placeholder="first value">  <input type="text" name="second_size[]" class="form-control" value="{{$data_square->second_size}}" placeholder="second value">  <input type="text" name="unit_size[]" class="form-control" value="{{$data_square->unit_size}}" placeholder="unit value"></td>
                            <td><input type="text" name="price[]" class="form-control" value="{{$data_square->price}}" placeholder="price"></td>
                            <td><input type="text" name="border_price[]" class="form-control" value="{{$data_square->border_price}}" placeholder="border price"></td>
                        </tr>
                    @endforeach
                </table>
            </form>

            <div class="row">
                <div class="col-md-10"><h2 class="h2-title">Panoramic</h2></div>
                <div class="col-md-2"><button type="submit" form="panoramic" class="btn btn-danger">Save</button> <button type="button" data-form="panoramic" class="btn btn-danger"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></div>
            </div>
            <form id="panoramic" method="post" action="{{url('adminpanel/pages/size/edit')}}">
                {{csrf_field()}}
                <input type="hidden" name="type" value="panoramic">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Border Price</th>
                    </tr>
                    @foreach($panoramic as $data_panoramic)
                        <tr>
                            <td>
                                <select name="title[]" class="form-control">
                                    @if($data_panoramic->unit == "in centimeters")
                                        <option value="in centimeters">in centimeters</option>
                                        <option value="in inches">in inches</option>
                                    @else

                                        <option value="in inches">in inches</option>
                                        <option value="in centimeters">in centimeters</option>
                                    @endif
                                </select>
                            </td>
                            <td><input type="text" name="first_size[]" class="form-control" value="{{$data_panoramic->first_size}}" placeholder="first value">  <input type="text" name="second_size[]" class="form-control" value="{{$data_panoramic->second_size}}" placeholder="second value">  <input type="text" name="unit_size[]" class="form-control" value="{{$data_panoramic->unit_size}}" placeholder="unit value"></td>
                            <td><input type="text" name="price[]" class="form-control" value="{{$data_panoramic->price}}" placeholder="price"></td>
                            <td><input type="text" name="border_price[]" class="form-control" value="{{$data_panoramic->border_price}}" placeholder="border price"></td>
                        </tr>
                    @endforeach


                </table>
            </form>
        </div>
    </div>
@stop

@section('script-block')
    <script>
        var tr = '<tr><td><select name="title[]" class="form-control"><option value=""></option><option value="in centimeters">in centimeters</option><option value="in inches">in inches</option></select></td><td><input type="text" name="first_size[]" class="form-control" placeholder="first value">  <input type="text" name="second_size[]" class="form-control" placeholder="second value">  <input type="text" name="unit_size[]" class="form-control" placeholder="unit value"></td><td><input type="text" name="price[]" class="form-control" placeholder="price"></td><td><input type="text" name="border_price[]" class="form-control" placeholder="border price"></td></tr>';
        jQuery(document).ready(function () {
            $('.btn-danger').click(function () {
                $('#' + $(this).attr('data-form')).children("table").children("tbody").append(tr);
            });

        });
    </script>
@stop