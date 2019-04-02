    @extends('/adminpanel/main')
@section('active1')
    class="active"
@stop
@section('title')
    Dashboard
@stop

@section('desc')
    Manage Your Site
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Website Overview</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$userCount}}</h2>
                    <h4>Users</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{$ordersCount}}</h2>
                    <h4>Orders</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{$imagesCount}}</h2>
                    <h4>Images</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                    <h4>Stats</h4>
                </div>
            </div>
        </div>
    </div>



    <!--Latest Users -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Latest Users</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                </tr>
                @foreach($latestUser as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
