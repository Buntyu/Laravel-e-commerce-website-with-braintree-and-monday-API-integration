@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Images</h3>
        </div>
        <div class="panel-body">
            <div class="row placeholders">
                @foreach($items as $i)
                    <a href="#myModal{{$i->id}}" data-toggle="modal">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            @if(!empty($i->src_size_img))
                                <img src="{{asset('assets/upload')}}/{{$i->src_size_img}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            @else
                                <img src="{{asset('assets/upload')}}/{{$i->originals_photo}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            @endif
                            <h4>{{$i->originals_photo}}</h4>
                            <span class="text-muted">{{$i->price}}</span>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <form class="form-horizontal" id="status-form" action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Status</label>
                            <div class="col-sm-6">
                                <select name="status" id="status" class="form-control">
                                    @if($item->status == "New")
                                        <option selected>New</option>
                                        <option>Failed</option>
                                        <option>Success</option>
                                    @endif
                                    @if($item->status == "Failed")
                                            <option >New</option>
                                            <option selected>Failed</option>
                                            <option>Success</option>
                                    @endif
                                    @if($item->status == "Success")
                                            <option >New</option>
                                            <option>Failed</option>
                                            <option selected>Success</option>
                                    @endif


                                </select>
                                <input type="hidden" name="id" value="{{$item->id}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-6 control-label">Customer fullname</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Phone</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">+{{$item->phone}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">City</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->city}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Postcode</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->postcode}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Price</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->total_price}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-6 control-label"></label>
                            <div class="col-sm-6">
                                <p class="form-control-static"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Customer e-mail</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->email}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Data orders</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->created_at}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Country</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->country}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Address</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$item->address}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Count images</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">4</p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            @if(!empty($item->notes))
            <div class="row">
                <div class="col-md-12">
                    <h3>Note</h3>
                    <p>{{$item->notes}}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
@stop

@section('modal-block')
    @foreach($items as $info)
        <div id="myModal{{$info->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Заголовок модального окна -->
                    <div class="modal-header main-color-bg" >
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important; opacity: 1 !important;">×</button>
                        <h4 class="modal-title">{{$info->originals_photo}}</h4>
                    </div>
                    <!-- Основное содержимое модального окна -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default ">
                                    <div class="panel-heading modal-panel-title">
                                        <h3 class="panel-title">Size</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-hover">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Unit</th>
                                                        <th>Size</th>
                                                        @if(!empty($info->src_size_img))<th>Photo</th> @endif
                                                    </tr>
                                                    <tr>
                                                        <td>{{$info->type}}</td>
                                                        <td>{{$info->unit}}</td>
                                                        <td>{{$info->size}}</td>
                                                        @if(!empty($info->src_size_img))<td><a target="_blank"  href="{{asset('assets/upload')}}/{{$info->src_size_img}}"><img src="{{asset('assets/upload')}}/{{$info->src_size_img}}"  width="200" height="200" class="img-responsive"></a></td> @endif
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($info->filter_photo))
                                <div class="panel panel-default">
                                    <div class="panel-heading modal-panel-title">
                                        <h3 class="panel-title">Style & Enhancements</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row placeholders">
                                            <div class="col-md-4 placeholder">
                                                <a target="_blank" href="{{asset('assets/upload')}}/{{$info->originals_photo}}"><img src="{{asset('assets/upload')}}/{{$info->originals_photo}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                                                <h4>Original</h4>
                                            </div>
                                            <div class="col-md-4 placeholder">
                                                <a target="_blank"  href="{{asset('assets/upload')}}/{{$info->filter_photo}}"><img src="{{asset('assets/upload')}}/{{$info->filter_photo}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail"></a>
                                                <h4>Filter</h4>
                                            </div>
                                            <div class="col-md-4">
                                                @if(isset($info->additional_filter_photo))
                                                    <h4>Photo enhancements</h4>
                                                    <p>
                                                        {{$info->additional_filter_photo}}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet at autem
                                                    commodi consequatur dolor enim esse expedita illo magni maiores nostrum quaerat
                                                    quasi quibusdam tenetur, ut voluptate, voluptatem voluptates.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="panel panel-default">
                                    <div class="panel-heading modal-panel-title">
                                        <h3 class="panel-title">Frame float</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4 placeholder">
                                                @if($info->border == "raw")
                                                    <img src="{{asset('img/border-brown.png')}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                                @endif
                                                @if($info->border == "white")
                                                    <img src="{{asset('img/border-white.png')}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                                @endif
                                                @if($info->border == "black")
                                                    <img src="{{asset('img/border-black.png')}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                                @endif
                                                <h4>{{$info->border}}</h4>
                                            </div>
                                            <div class="col-md-8">
                                                <h4>Note</h4>
                                                <p>{{$info->border_additional_info}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Футер модального окна -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@stop