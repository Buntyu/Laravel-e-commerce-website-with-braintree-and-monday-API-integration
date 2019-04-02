<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Canvas Dashboard | AdminPanel</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/adminpanel.files/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('/adminpanel.files/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/adminpanel.files/css/style.css')}}" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CanvasDashboard</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @yield('active1')><a href="{{url('adminpanel')}}">Dashboard</a></li>
                <li @yield('active2')><a href="{{url('adminpanel/pages')}}">Page info</a></li>
                <!--<li><a href="orders.html">Post</a></li>-->
                <li @yield('active3')><a href="{{url('adminpanel/orders')}}">Orders</a></li>
                <li @yield('active4')><a href="{{url('adminpanel/users')}}">New Users</a></li>
                <li @yield('active5')><a href="{{url('adminpanel/new-artworks')}}">New Artworks</a></li>
                <li @yield('active6')><a href="{{url('adminpanel/all-users')}}">Users</a></li>
                <li @yield('active7')><a href="{{url('adminpanel/withdraw')}}">Withdraw</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle drop-nav" data-toggle="dropdown">
                            Menu <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('adminpanel/setting')}}"><span class="glyphicon glyphicon-cog"></span> Setting </a></li>
                            <li>
                                <form action="{{url('adminpanel/logout')}}" id="form-logout" method="post">
                                    {{ csrf_field() }}
                                    <a href="#" style="margin-left: 22px; color: black" onclick="document.getElementById('form-logout').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </form>

                            </li>
                        </ul>
                    </div>
                </li>

            </ul>



        </div><!--/.nav-collapse -->
    </div>
</nav>
<header id="header">
    <div class="container">
        <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  @yield('title') <small>@yield('desc')</small></h1>
        </div>
        <!--
        <div class="col-md-2">
            <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a type="button" data-toggle="modal" data-target="#addPage" href="#">Add Image</a></li>
                        <li><a href="#">Add User</a></li>
                    </ul>
                </div>
            </div>
        </div>-->
    </div>
</header>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>
<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Website Pages
                    </a>
                    <a href="{{url('/')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Main</a>
                    <a href="{{url('/print-your-own')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Print your own</a>
                    <a href="{{url('/galery')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Print From Our Gallery</a>
                    <a href="{{url('/commercial-printing')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comercial Printing</a>

                </div>

                <div class="list-group">
                    <a href="#" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                    </a>
                    <a href="{{url('adminpanel/orders')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Orders <span class="badge">{{\App\Models\Order::count()}}</span></a>
                    <!--<a href="{{url('adminpanel/orders')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Images <span class="badge">{{\App\Models\PersonalAccountModel::count()}}</span></a>-->
                    <a href="{{url('adminpanel/users')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">{{\App\Models\User::count() - 1}}</span></a>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <p>Copyright AdminStrap, &copy; 2017 </p>
</footer>

<!-- Modals -->

<!-- Add Page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" class="form-control" placeholder="Page Title">
                    </div>
                    <div class="form-group">
                        <label>Page Body</label>
                        <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Published
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Meta Tags</label>
                        <input type="text" class="form-control" placeholder="Add Some Tags...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@yield('modal-block')





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@yield('script-block')
<script>
    CKEDITOR.replace( 'editor1' );
    jQuery(document).ready(function () {
        $(".btn").click(function() {
            //открыть модальное окно с id="myModal"
            $("#myModal").modal('show');
        });

        $(document).on('change', '#status', function(e){
            e.preventDefault();
            submitFrom($('#status-form').serialize());

        });

        function submitFrom(data) {
            console.log('/ajax/change-status-order?' + data);

            $.ajax({
                url: '/ajax/change-status-order?' + data
            }).done(function () {

            })
        }
    });

</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/adminpanel.files/js/bootstrap.js')}}"></script>
</body>
</html>