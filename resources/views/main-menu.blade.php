
<header class="header-content">
    <div class="logo">
        <a href="/"><img src="{{ asset('assets/upload') }}/{{$global_setting->logo}}" alt=""></a>
    </div>
    <div class="header-nav"> <a href="/#secondPage">Our quality</a> <a href="/#3rdPage">What we offer</a> <a href="/#4thPage">What sets us apart</a><a href="/#5thPage">Contact</a>
        <div class="basket_wrap">
            <a href="{{url('orders/step-5')}}">
                       <span class="basket">
                           <img src="{{asset('img/basket.png')}}" alt="">
                            <span>@php
                                    echo count(Session::get('images-upload'));
                                @endphp
                            </span>
                       </span>
            </a>
            <div class="basket_hint">
                In your cart @php
                    echo count(Session::get('images-upload'));
                @endphp items
                in total cost $<div class="global-total-price">@php
                    echo App\Models\Order::getGlobalTotalPrice();
                @endphp</div>
                <a href="{{url('orders/step-5')}}" class="go_to_cart">Go to cart</a>
            </div>

        </div>
        <!--@if(Sentinel::check())
            <div class="my-account">
                <i></i>
                <a href="{{url('my-account/')}}"> My Account</a>
            </div>
        @else
            <div class="my-account">
                <i></i>
                <a href="{{url('my-account/login')}}"> Sign In /</a>
                <a href="{{url('my-account/registration')}}"> Sign Up</a>
            </div>
        @endif -->

    </div>

    <div class="burger">
        <!--	burger			-->
        <nav class="navigation">
            <div class="hamburger" style="position: absolute;"> <span class="bars"></span> </div>
            <div class="menu">
                <ul>
                    @if(Sentinel::check())
                        <li><a href="{{ url('my-account') }}"><span></span>My account</a></li>
                    @else
                        <li class="my-account-mob">
                            <span></span>
                            <a href="{{url('my-account/login')}}"> Log In /</a>
                            <a href="{{url('my-account/registration')}}"> Sign Up</a>
                        </li>
                    @endif


                    <li><a href="/#section1">Our Quality</a></li>
                    <li><a href="{{ url('print-your-own') }}">Print Your Own</a></li>
                    <li><a href="{{ url('gallery') }}">Print From Gallery</a></li>
                    <li><a href="{{ url('commercial-printing') }}">Commercial Printing </a></li>
                    <li><a href="/#4thPage">What Sets Us Apart</a></li>
                </ul> <a href="/#5thPage" class="title">Contact</a> <a href="tel:{{$global_setting->phone_number}}" class="tel">{{$global_setting->phone_number}}</a>
                <div class="address"><span>Appointment Only</span> {{$global_setting->address}}</div>
                <form action=""> <a href="mailto:{{$global_setting->email}}" class="mail">{{$global_setting->email}}</a> </form>
                <div class="icons">
                    <a href="{{$global_setting->facebook}}"> <img src="{{asset('img/landing-icons-facebook.png')}}" alt=""> </a>
                    <a href="{{$global_setting->google}}"> <img src="{{asset('img/landing-icons-google.png')}}" alt=""> </a>
                    <a href="{{$global_setting->instagram}}"> <img src="{{asset('img/landing-icons-instagram.png')}}" alt=""> </a>
                </div>
            </div>
        </nav>
        <!--	burger - end			-->
    </div>
</header>