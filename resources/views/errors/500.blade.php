<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>Error 500</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="error">
        <div class="error-content">
            <div class="error-number">500</div>
            <h1>Internal Server Error</h1>
            <p>
                Something goes wrong, please try back later.
            </p>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(function () {
        var h_screen = $(window).height();
        $(".error").css("height", h_screen);
    });
</script>
</body>

</html>