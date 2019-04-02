@extends('adminpanel/main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">User Information</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('adminpanel/all-users/profile/delete/')}}/{{$user[0]->id}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
                <form class="form-horizontal" id="status-form" action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Name</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Phone</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->phone}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Style work</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->style_work}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Example</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->example}}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="col-sm-6 control-label">E-mail</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->email}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">"Are you interested in selling orginals? "</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->sell_originals}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">"Is your work ready to print?"</label>
                            <div class="col-sm-6">
                                <p class="form-control-static">{{$user[0]->ready_to_print}}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <label class="col-sm-2 control-label">User Biography</label>
                    </div>
                    <div class="col-md-12">
                        <p class="form-control-static">{{$user[0]->bio}}</p>
                    </div>



                </form>

            </div>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Images</h3>
        </div>
        <div class="panel-body">
            <div class="row placeholders">
                @forelse($artworks as $i)
                    <a href="{{url('adminpanel/artworks/edit/')}}/{{$i->id}}" data-toggle="modal">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="{{asset('assets/upload')}}/{{$i->image}}" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>{{$i->title}}</h4>
                            <span class="text-muted">{{$i->price}}</span>
                        </div>
                    </a>
                @empty
                        <h3>Artworks Not Found</h3>
                @endforelse

            </div>
        </div>
    </div>
@stop

@section('modal-block')


@stop