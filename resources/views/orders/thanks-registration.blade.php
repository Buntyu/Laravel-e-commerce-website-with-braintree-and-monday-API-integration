<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>Thanks for registration</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="message-container">
        <h1>Thank you for registering!</h1>
        <p>
            Connected with us on.
        </p>
        <div class="icons">
            <a href="{{$global_setting->facebook}}"> <img src="{{ asset('img/facebook.png') }}" alt=""> </a>
            <a href="{{$global_setting->google}}"> <img src="{{ asset('img/google-plus.png') }}" alt=""> </a>
            <a href="{{$global_setting->instagram}}"> <img src="{{ asset('img/instagram.png') }}" alt=""> </a>
        </div>
        <a href="{{url('my-account')}}" class="back_home">Вack home</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>

</html>