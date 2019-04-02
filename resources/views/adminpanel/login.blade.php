<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Canvas Dashboard | Account Login</title>

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

        </div><!--/.nav-collapse -->
    </div>
</nav>
<header id="header">
    <div class="container">
        <div class="col-md-12">
            <h1 class="text-center">Dashboard <small>Account Login</small></h1>
        </div>

    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="{{url('adminpanel/login')}}" id="login" method="post" class="well">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Email Adress</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer id="footer">
    <p>Copiright AdminStrap, &copy; 2017 </p>
</footer>

<!-- Modals -->



<script>
    CKEDITOR.replace( 'editor1' );
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/js/bootstrap.js')}}"></script>
</body>
</html>