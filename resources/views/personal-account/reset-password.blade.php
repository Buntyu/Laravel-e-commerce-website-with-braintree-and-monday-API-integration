<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        #forgot-form{
            display: none;
        }
    </style>
</head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="content">
        <div class="content-inner">
            <div class="title">Reset Password</div>
            <div class="section">
                <div class="left">
                    <div class="left-title">New Customers</div>
                    <div class="left-description">
                        By creating an account at Canvas Factory you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made.
                    </div>
                    <a href="{{ url('my-account/registration') }}">REGISTER</a>
                </div>
                <div class="right">
                    <form id="log-form" action="" method="post">
                        {!! csrf_field() !!}

                        @if(session('success'))
                            <div class="message-info">{{session('success')}}</div>
                        @endif
                        <div class="label">
                            <label for="password">New Password</label>
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                        <div class="input pass">
                            <input type="password" id="password" name="password" required>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit">UPDATE PASSWORD</button>
                        <a href="{{url('my-account')}}" class="forgot">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    jQuery(function ($) {

        $(".hamburger").click(function () {
            $(".navigation").toggleClass("open");
            if ($("nav").hasClass("open")) {
                $(".hamburger").css("position", "fixed");
            }
            else {
                $(".hamburger").css("position", "absolute");
            }
        })
    });
</script>
</body>

</html>