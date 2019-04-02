

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>my artworks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> </head>
    @yield('style')
<body>
<div class="wrapper">
    @include('main-menu')
    <div class="content-myartworks">
        <div class="content-inner">
            <div class="left_side left_side_money">
                <a href="{{url('my-account')}}" class="back">Back to profile</a>
                <a class="edt_profile" href="{{url('my-account/edit-profile')}}">Edit Profile</a>
                <div class="balance">
                    <div class="bal-text">My balance</div>
                    <div class="bal-sum">${{$balance}}</div> <a href="#" class="withdraw_money">Withdraw money</a> <a href="{{url('my-account/faq')}}">FAQ</a>
                    <form action="{{url('my-account/logout')}}" id="form-logout" method="post">
                        {{ csrf_field() }}
                        <a href="#" onclick="document.getElementById('form-logout').submit();">Logout</a>
                    </form>
                </div>
                <div class="sales-text">Sales history</div>
                <div class="sales-history">
                    @foreach($art_history as $art_item)
                        <div class="sales-item">
                            <div class="sales-name">Artworks {{$art_item->order_id}}</div>
                            <div class="sales-price">${{$art_item->artwork_price}}</div>
                            <div class="sales-date">{{$art_item->created_at}}</div>
                        </div>
                    @endforeach

                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
@yield('modal')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
@yield('scripts')
</body>

</html>


