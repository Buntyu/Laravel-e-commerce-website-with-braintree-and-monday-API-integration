<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>Thanks for order</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="message-container">
        <h1>Thank you for ordering!</h1>
        <p>Your order was successfully processed!</p>
        <p class="order-info">
            Your order was successfully processed!
            <br>
            Order number: <span>{{$id}}</span>
            <br>
            We appreciate your business and will get your order carefully packed and shipped to you.
            <br>
            An order confirmation email has been sent to <span>{{$email}}.</span>
            <br>
            Please call us 0401 803 186 with any questions or comments.
        </p>
        <a href="/" class="back_home">Вack home</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>

</html>