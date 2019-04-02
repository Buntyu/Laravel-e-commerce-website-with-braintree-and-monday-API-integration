<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="{{$seo->description}}" />
    <meta name="keywords" content="{{$seo->keywords}}" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>{{$seo->title}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
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
            <div class="title">Welcome. Please Sign In</div>
            <div class="section">
                <div class="left">
                    <div class="left-title" style="font-size: 18px;">New Artists</div>
                    <div class="left-description">Welcome to the Canvas Print Studio Artist Gallery, a free online platform for artists to sell their work. Have your artwork publicised to a wider audience of industry professionals, online shoppers and art collectors.</div>
                    <a href="{{ url('my-account/registration') }}">REGISTER</a>
                </div>
                <div class="right">
                    <form id="log-form" action="{{ url('my-account/login') }}" method="post">
                        {!! csrf_field() !!}

                        @if(session('success'))
                            <div class="message-info">{{session('success')}}</div>
                        @endif
                        <div class="label">
                            <label for="mail">Email</label>
                            <label for="password">Password</label>
                        </div>
                        <div class="input">
                            <input type="email" id="mail" name="email" required>
                            <input type="password" id="password" name="password" required> </div>

                        <button type="submit">LOGIN</button>
                         <a id="btn-forgot-password" href="" class="forgot">Forgot password?</a>
                    </form>
                    <form id="forgot-form" action="{{ url('my-account/forgot-password') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="label">
                            <label for="mail">Email</label>
                        </div>
                        <div class="input">
                            <input type="email" id="mail" name="email" required>
                        </div>
                        <button type="submit">FORGOT PASSWORD</button>
                         <a href="" id="btn-back-login" class="forgot">Back To Login?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('modal-error')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello">Incorrect email or password!</p>
            <p>Please write correct information.</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<div class="hint_wrapper" @if(!session('activate-error')) style="display: none" @endif>
    <div class="hint_background"></div>
    <div class="hint_outside">
        <button class="hint_close"></button>
        <div class="hint_body">
            <p class="hello" style="    line-height: 40px;">Your account isn’t active. Please wait for us to review your application, an activation link will be sent to your email if you are successful.</p>
            <a class="ok">OK</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('js/hints.js') }}"></script>
<script>
    jQuery(function ($) {
        $('#btn-forgot-password').click(function (e) {
            e.preventDefault();
            $('#log-form').hide();
            $('#forgot-form').show();
        });
        $('#btn-back-login').click(function (e) {
            e.preventDefault();
            $('#log-form').show();
            $('#forgot-form').hide();
        });
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