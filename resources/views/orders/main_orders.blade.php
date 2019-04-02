<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>01</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    @yield('style')

</head>

<body>
<div class="wrapper">
    @include('main-menu')
    @yield('content')
</div>
@yield('modal')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
@yield('scripts')
</body>

</html>