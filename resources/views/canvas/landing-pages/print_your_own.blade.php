@extends('canvas/landing-pages/landing_main')
@section('description')
    {{$seo->descriptions}}
@stop
@section('keywords')
    {{$seo->keywords}}
@stop
@section('title')
    {{$seo->title}}
@stop

@section('content')
    <div class="sub-header">
        <div class="sub-inner"> <a class="nav_land nav1" href="{{url('print-your-own')}}"><span class="active">PRINT YOUR OWN</span></a> <a class="nav_land nav2" href="{{url('gallery')}}"><span>PRINT FROM OUR GALLERY</span></a> <a class="nav_land nav3" href="{{url('commercial-printing')}}"><span>COMMERCIAL PRINTING</span></a> </div>
    </div>
    <div class="content-inner">
        <div class="section1">
            <h1>How It Works</h1>
            <p>Every canvas print is custom made in our Melbourne print studio. Our process
                includes meticulous attention to detail from start to finish to ensure you

                receive the best possible result.</p>
            <div class="group">
                <!--		slider     	-->
                <div id="slider1" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="box box1">
                            <a href="{{url('orders/step-1')}}"><img src="{{asset('img/box1-landing.png')}}" alt=""></a>
                            <div class="title">Upload your image</div>
                            <div class="description"> We'll review your image and let you know if there are any issues. <a href="{{url('orders/step-1')}}">Order now</a> </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box box2">
                            <a href="#"><img src="{{asset('img/box22-landing.png')}}" alt=""></a>
                            <div class="title">Select size</div>
                            <div class="description"> Choose a standard size or contact us for a custom size. <a href="#to_tabs_all">View sizes</a></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box"> <img src="{{asset('img/box33-landing.png')}}" alt="">
                            <div class="title">Free enhancements</div>
                            <div class="description"> We enhance and correct images at no extra cost. </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box box4"> <img src="{{asset('img/box44-landing.png')}}" alt="">
                            <div class="title">Add floating frame</div>
                            <div class="description"> Complete your canvas with an optional floating frame. </div>
                        </div>
                    </div>
                </div>
                <!--		slider	- end	-->
            </div>
        </div>
        <div class="section2">
            <h1 id="to_tabs_all">Sizes & Prices</h1>
            <p>Each canvas comes stretched and ready to hang. Our selection of sizes are designed to minimise canvas wastage and offer the best value for money. If you require a custom size, please <a href="/#5thPage">contact us</a> for a quote.</p>
            <!--tabs-->
            <div id="tabs_all" class="docs-toggles">
                <ul class="tabs tabs_title">
                    <li><a href="#tab1" class="size-type" data-type="Photo">Photo</a>
                        <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.5" >
                    </li>
                    <li><a href="#tab2" class="size-type" data-type="Square">Square</a><input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1"></li>
                    <li><a href="#tab3" class="size-type" data-type="Panoramic">Panoramic</a><input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="3"></li>
                </ul>
                <div id="tab1" class="tab_content">
                    <ul class="tabs">
                        <li><a href="#tab2-1" class="size-unit" data-unit="in centimeters">in centimeters</a></li>
                        <li><a href="#tab2-2" class="size-unit" data-unit="in inches">in inches</a></li>
                    </ul>
                    <div id="tab2-1">
                        <div class="group">
                            @foreach($photo_cm as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                    <div id="tab2-2">
                        <div class="group">
                            @foreach($photo_in as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                </div>
                <div id="tab2" class="tab_content">
                    <ul class="tabs">
                        <li><a href="#tab3-1" class="size-unit" data-unit="in centimeters">in centimeters</a></li>
                        <li><a href="#tab3-2" class="size-unit" data-unit="in inches">in inches</a></li>
                    </ul>
                    <div id="tab3-1">
                        <div class="group">
                            @foreach($square_cm as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                    <div id="tab3-2">
                        <div class="group">
                            @foreach($square_in as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                </div>
                <div id="tab3" class="tab_content">
                    <ul class="tabs">
                        <li><a href="#tab4-1" class="size-unit" data-unit="in centimeters">in centimeters</a></li>
                        <li><a href="#tab4-2" class="size-unit" data-unit="in inches">in inches</a></li>
                    </ul>
                    <div id="tab4-1">
                        <div class="group">
                            @foreach($panoramic_cm as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                    <div id="tab4-2">
                        <div class="group">
                            @foreach($panoramic_in as $item)
                                <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                            @endforeach
                                <a href="/#5thPage" class="size_price custom_size"> Custom size </a>
                        </div>
                        <a class="make-order" href="{{url('orders/step-1')}}">
                            Order Now
                        </a>
                    </div>
                </div>
            </div>
            <!--tabs - end-->
        </div>
        <div class="section3">
            <h1>Testimonials</h1> <img src="img/landing-slider2.png" alt="">
            <!--		slider		-->
            <div class="comment">
                <div id="slider2" class="owl-carousel owl-theme">
                    @foreach($testimonials as $data)
                        <div class="item">
                            <div class="text">{{$data->description}}</div>
                            <div class="person">{{$data->title}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--		slider	- end	-->
        </div>
        <div class="section4">
            <h1>Additional Services</h1>
            <div class="group">
                @foreach($additionalService as $data)
                    <div class="land-box box{{$data->id}}" style="background-image: url('../img/filter.png'), url('{{asset('assets/upload') . '/' . $data->image}}')">
                        <div class="title"> {{$data->title}} </div>
                        <div class="text-hover"> {{$data->description}} </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            var target_size = $(".section2").offset().top;
            var w_h = $(window).height();
            var target_h = $(".section2").height();
            var target_mar = (w_h - target_h) / 2;
            var target_mar_fin = target_size - target_mar + 40;


            $(".group .box2 a").click(function () {
                $('html, body').animate({
                    scrollTop: target_mar_fin
                }, 1000);
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            var w_size = $(document).width();
            var owl1 = $("#slider1");
            var owl2 = $("#slider2");
            if (w_size < 1365) {
                owl1.owlCarousel({
                    navigation: true
                    , pagination: false
                    , items: 4
                    , itemsDesktop: [1440, 4]
                    , itemsDesktopSmall: [1300, 3]
                    , itemsTablet: [945, 2]
                    , itemsTabletSmall: [640, 1]
                    , });
            }
            owl2.owlCarousel({
                navigation: true
                , pagination: false
                , singleItem: true
                , transitionStyle: "fade"
                , autoHeight: true
            });
        });
    </script>
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
    <!--tabs-->
    <script>
        jQuery('ul.tabs').each(function () {
            // For each set of tabs, we want to keep track of
            // which tab is active and it's associated content
            var $active, $content, $links = jQuery(this).find('a');
            // If the location.hash matches one of the links, use that as the active tab.
            // If no match is found, use the first link as the initial active tab.
            $active = jQuery($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);
            // Hide the remaining content
            $links.not($active).each(function () {
                jQuery(this.hash).hide();
            });
            // Bind the click event handler
            jQuery(this).on('click', 'a', function (e) {
                // Make the old tab inactive.
                $active.removeClass('active');
                $content.hide();
                // Update the variables with the new link and content
                $active = jQuery(this);
                $content = jQuery(this.hash);
                // Make the tab active.
                $active.addClass('active');
                $content.show();
                // Prevent the anchor's default click action
                e.preventDefault();
            });
        });
    </script>
@stop
