<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>Your file is too big</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="message-container b-file">
        <h1>Oh no, your file is too big!</h1>
        <p>Contact us and we will email you a link for uploading :-)</p>
        <form action="">
            <label for="">Email</label>
            <input type="text">
            <button type="submit" class="back_home">Receive</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>

</html>