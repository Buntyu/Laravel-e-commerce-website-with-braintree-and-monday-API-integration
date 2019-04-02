@extends('orders/main_orders')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('owl.carousel2/assets/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('cropper/css/cropper.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
@stop
@section('active2')
    class="active"
@stop
@section('content')
    <div class="content-00 content-03-size">
        <div class="content-inner">
            @include('orders/breadcrumbs')
            <a href="{{url('orders/step-3')}}" class="next-step">next step <i></i></a> <a href="{{url('orders/step-1')}}" class="next-step back-step "><i></i> step back </a>
            <!--        slider with all foto           -->
            <div id="sync0" class="loop owl-carousel owl-theme">
                @foreach($images as $key => $img)
                    @if(!isset($img['from-gallery']))
                    @if(isset($img['src_size_img']))
                        <div class="item @if($key == 0) first_item @endif"  data-image="{{asset('assets/upload/' . $img['src_size_img'])}}" data-id="{{$key}}">
                            @else
                                <div class="item @if($key == 0) first_item @endif" data-image="{{asset('assets/upload/' . $img['name'])}}" data-id="{{$key}}">
                            @endif

                        <div class="items synced">
                            <div class="check">
                                @if(isset($img['src_size_img']))
                                    <div class="img" style="background-image: url('{{asset('assets/upload/' . $img['src_size_img'])}}')"></div>
                                        @else
                                            <div class="img" style="background-image: url('{{asset('assets/upload/' . $img['name'])}}')"></div>
                                                @endif

                                @if(isset($img['size'])) <div class="ok-item"></div> @endif

                                <div class="text">
                                    @if(isset($img['type']))
                                        Type: {{$img['type']}} <br>
                                        Unit: {{$img['unit']}} <br>
                                        Size: {{$img['size']}} <br>
                                        @if(isset($img['subject_removal']))
                                            Price: {{$img['price'] + $img['subject_removal']}}<br>
                                            @else
                                            Price: {{$img['price']}}<br>
                                        @endif

                                    @endif
                                        @if(isset($img['border']) && $img['border']!='none')
                                            Frame: {{$img['border']}} <br>
                                            Frame price: {{$img['border_price']}} <br>
                                            Total price: {{$img['border_price'] + $img['price']}} <br>
                                        @endif

                                </div>
                            </div>
                        </div>

                    </div>
                            @endif
                @endforeach
            </div>
            <!--				slider  -   end       -->
                            <button class="btn_confirm">Сonfirm changes</button>

            <div class="inner_03">
                <div class="left-side">
                    <!--tabs-->
                    <div id="tabs_all" class="docs-toggles">
                        <ul class="tabs tabs_title">
                            <li><a href="#tab1" class="size-type" data-type="Photo">Photo</a>
                            </li>
                            <li><a href="#tab2" class="size-type" data-type="Square">Square</a>
                            </li>
                            <li><a href="#tab3" class="size-type" data-type="Panoramic">Panoramic</a>
                            </li>
                        </ul>
                        <div id="tab1" class="tab_content">
                            <ul class="tabs">
                                <li><a href="#tab2-1" class="size-unit" data-unit="in centimeters">in centimeters</a></li>
                                <li><a href="#tab2-2" class="size-unit" data-unit="in inches">in inches</a></li>
                            </ul>
                            <div id="tab2-1">
                                <div class="group">
                                    @foreach($photo_cm as $item)
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab2-2">
                                <div class="group">
                                    @foreach($photo_in as $item)
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
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
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab3-2">
                                <div class="group">
                                    @foreach($square_in as $item)
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
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
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab4-2">
                                <div class="group">
                                    @foreach($panoramic_in as $item)
                                        <div class="size_price" data-border-price="{{$item->border_price}}" data-size="{{$item->first_size}} x {{$item->second_size}} {{$item->unit_size}}" data-size-id="{{$item->id}}" data-price="{{$item->price}}"> <i>{{$item->first_size}}</i> x <i>{{$item->second_size}}</i> {{$item->unit_size}} — <span><sup>$</sup>{{$item->price}}</span> </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tabs - end-->
                    <div class="function_box">
                        <span>Orientation</span>
                        <a class="function landscape">Landscape</a>
                        <a class="function portrait">Portrait</a>
                    </div>
                    <div class="function_box" id="actions">
                        <span>Functions</span>
                        <div class="docs-buttons">
                            <button type="button" class="function" data-method="reset" title="Reset">
                                Reset
                            </button>
                            <button type="button" class="function" data-method="setDragMode" data-option="move" title="Move">
                                Move
                            </button>
                            <button type="button" class="function" data-method="zoom" data-option="0.1" title="Zoom In">
                                Zoom In
                            </button>
                            <button type="button" class="function" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                Zoom Out
                            </button>
                            <button type="button" class="function" data-method="rotate" data-option="-45" title="Rotate Left">
                                Rotate Left
                            </button>
                            <button type="button" class="function" data-method="rotate" data-option="45" title="Rotate Right">
                                Rotate Right
                            </button>
                            <button type="button" class="function" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                Scale X
                            </button>
                            <button type="button" class="function" data-method="scaleY" data-option="-1" title="Flip Vertical">
                                Scale Y
                            </button>
                            <a id="download" class="none" href="javascript:void(0);" download="cropped.jpg" data-method="getCroppedCanvas">Download</a>
                        </div>
                        <div class="docs-toggles none">
                            <input type="radio" id="aspectRatio1" name="aspectRatio" value="1.5" >
                            <input type="radio" id="aspectRatio2" name="aspectRatio" value="1">
                            <input type="radio" id="aspectRatio3" name="aspectRatio" value="3">
                            <input type="radio" id="aspectRatio4" name="aspectRatio" value="0.69">
                        </div>
                    </div>
                    <form id="step2-form" name="step2-from" action="{{url('orders/step-2/select-size')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="value-type" name="type" value="{{$default_size->type}}">
                        <input type="hidden" id="value-unit" name="unit" value="{{$default_size->unit}}">
                        <input type="hidden" id="value-size" name="size" value="{{$default_size->first_size}} x {{$default_size->second_size}} {{$default_size->unit_size}}">
                        <input type="hidden" id="value-price" name="price" value="{{$default_size->price}}">
                        <input type="hidden" id="value-border-price" name="border_price" value="{{$default_size->border_price}}">
                        <input type="hidden" id="src-size-img" name="src_size_img">
                        <input type="hidden" id="value-id" name="id" value="{{$active_image['id']}}">
                        <textarea name="size-additional-info" id="" placeholder="Provide any additional information here ..."></textarea>
                        <!--<input type="submit" name="accept" value="Accept">-->
                    </form>
                </div>
                <div class="right-side">
                    <img id="image" src="{{ asset('img/02_slider.png') }}" alt="">
                </div>
                <div class="photo_size">
                    <div class="photo_difference">
                        <div class="dif_text"> Click on any picture to select size </div>
                    </div>
                </div>

            </div>
            <div class="bottom-info">
                <div class="section section1">
                    <div class="box">
                        <div class="title">Image Quality</div>
                        <div class="text">All images are carefully reviewed before printing and we’ll contact you if there is an issue.</div>
                    </div>
                    <div class="box">
                        <div class="title">Large Prints</div>
                        <div class="text">We can enlarge and improve your image quality at no extra cost, so you can go big!</div>
                    </div>
                </div>
                <div class="section section2">
                    <div class="box">
                        <div class="title">Canvas Wrap</div>
                        <div class="text">Our recommended technique is a
                            <div class="tooltip"> <span class="hint">pixel stretch.</span>
                                <div class="tooltiptext"> A pixel stretch is a clever and subtle way to cover the sides of your canvas. This avoids any part of your image being wrapped and lost around the sides. </div>
                            </div> If you require a different edge simply let us know. </div>
                    </div>
                    <div class="box">
                        <div class="title">Ready to Hang</div>
                        <div class="text">Your canvas print will arrive fully stretched, ready to hang and admire! </div>
                    </div>
                </div>
                <div class="section section3">
                    <div class="left"> <img src="{{asset('img/contact.png')}}" alt=""> </div>
                    <div class="right"> <a href="/#5thPage" class="title">Contact us for a quote or custom size</a>
                        <div class="text">0401 803 186</div> <a href="mailto:print@canvasprintstudio.com.au" class="mail-footer">
                            print@canvasprintstudio.com.au
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    @if($open_modal == true)
    <!--модалка -->
        <div class="hint_wrapper">
            <div class="hint_background"></div>
            <div class="hint_outside">
                <button class="hint_close"></button>
                <div class="hint_body">
                    <p class="hello">Step 2 - Select size!</p>
                    <p>Choose a standard size or contact us for a custom size.</p>
                    <a class="ok">OK</a>
                </div>
            </div>
        </div>
        <!--модалка - кінець-->
    @endif
    <script src="{{ asset('owl.carousel2/owl.carousel.js') }}"></script>
    <script src="{{ asset('owl.carousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/hints.js') }}"></script>
    <script>
        $(document).ready(function () {
            var img = '{{asset('assets/upload')}}/{{$active_image['name']}}';
            $(".cropper-wrap-box").find("img").attr('src',img);
            $(".cropper-crop-box").find("img").attr('src',img);
            $('#image').attr('src',img);
            $('.item').click(function () {
                var img = $(this).attr('data-image');
                $(".cropper-wrap-box").find("img").attr('src',img);
                $(".cropper-crop-box").find("img").attr('src',img);
                $('#image').attr('src',img);
                $('#value-id').val($(this).attr('data-id'));
            });

            $('.size-type').click(function () {
                $('#value-unit').val('in centimeters');
                $('#value-type').val($(this).attr('data-type'));
            });
            $('.size-unit').click(function () {
                $('#value-unit').val($(this).attr('data-unit'));
            });
            $('.size_price').click(function () {
                $('#value-size').val($(this).attr('data-size-id'));
                $('#value-price').val($(this).attr('data-price'));
                $('#value-border-price').val($(this).attr('data-border-price'));
            });
            //slider foto
            $('.loop').owlCarousel({
                items: 6
                , margin: 5
                , nav: true
                , responsive: {
                    0: {
                        items: 1
                    }
                    , 450: {
                        items: 2
                    }
                    , 700: {
                        items: 3
                    }
                    , 1100: {
                        items: 4
                    }
                    , 1400: {
                        items: 4
                    }
                    , 1600: {
                        items: 5
                    }
                    , 1900: {
                        items: 6
                    }
                }

            });
            var window_w = $(document).width();
            if ( window_w > 1900 ) {
                if ($('.owl-item').length <= 6) {
                    $(".owl-controls").addClass("hide_arrow");
                } else {
                    $(".owl-controls").removeClass("hide_arrow");
                }
            } else {
                if ( (window_w < 1900) && (window_w >= 1600) ) {
                    if ($('.owl-item').length <= 5) {
                        $(".owl-controls").addClass("hide_arrow");
                    } else {
                        $(".owl-controls").removeClass("hide_arrow");
                    }
                } else {
                    if ( (window_w < 1600) && (window_w >= 1100) ) {
                        if ($('.owl-item').length <= 4) {
                            $(".owl-controls").addClass("hide_arrow");
                        } else {
                            $(".owl-controls").removeClass("hide_arrow");
                        }
                    } else {
                        if ( (window_w < 1100) && (window_w >= 700) ) {
                            if ($('.owl-item').length <= 3) {
                                $(".owl-controls").addClass("hide_arrow");
                            } else {
                                $(".owl-controls").removeClass("hide_arrow");
                            }
                        } else {
                            if ( (window_w < 700) && (window_w >= 450) ) {
                                if ($('.owl-item').length <= 2) {
                                    $(".owl-controls").addClass("hide_arrow");
                                } else {
                                    $(".owl-controls").removeClass("hide_arrow");
                                }
                            } else {
                                if ($('.owl-item').length <= 1) {
                                    $(".owl-controls").addClass("hide_arrow");
                                } else {
                                    $(".owl-controls").removeClass("hide_arrow");
                                }
                            }
                        }
                    }
                }
            }

            $("#sync0 .items").click(function () {
                $("#sync0 .items").removeClass("synced");
                $(this).toggleClass("synced");
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
            $(".size_price").click(function () {
                $(".size_price").removeClass("active");
                $(this).toggleClass("active");
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
    <script src="{{asset('cropper/js/cropper.js')}}"></script>
    <script src="{{asset('cropper/js/main.js')}}"></script>
        <script>

            $(document).on("click", ".tabs_title li:first-child a", function() {
                $("#aspectRatio1").trigger("click");
                $(".content-03-size .orientation").show();
            });

            $(document).on("click", ".tabs_title li:nth-child(2) a", function() {
                $("#aspectRatio2").trigger("click");
                $(".content-03-size .orientation").hide();
            });

            $(document).on("click", ".tabs_title li:last-child a", function() {
                $("#aspectRatio3").trigger("click");
                $(".content-03-size .orientation").hide();
            });

            $(document).on("click", ".portrait", function() {
                $("#aspectRatio4").trigger("click");
            });

            $(document).on("click", ".landscape", function() {
                $("#aspectRatio1").trigger("click");
            });

            $(document).on("click", ".btn_confirm", function() {
                $("#download").trigger("click");
            });


            $(".function").click(function() {
                $(".function").css({
                    "opacity": "1",
                    "text-decoration": "underline"
                });
                $(this).css({
                    "opacity": "0.5",
                    "text-decoration": "none"
                });
            });


            $(document).on("click", "#sync0 .item", function() {
                if( $(".tabs_title li:first-child a").hasClass("active") ){
//            перезалей код этого on click
                    $(".tabs_title li:nth-child(1) a").trigger("click");
                } else {
                    if( $(".tabs_title li:nth-child(2) a").hasClass("active") ){
                        $("#aspectRatio1").trigger("click");
                        $(".tabs_title li:first-child a").trigger("click");
                    } else {
                        if( $(".tabs_title li:last-child a").hasClass("active") ){
                            $("#aspectRatio1").trigger("click");
                            $(".tabs_title li:first-child a").trigger("click");
                        } else {}
                    }
                }
            });

        </script>

        <script>
            $(document).on("click", "#sync0 .item", function() {
                $(".content-03-size .photo_size").hide(0);
                $(".content-03-size .inner_03 .right-side").show(0);
            });
        </script>
        <script>
            $('.btn_confirm').click(function (){
                if( $(".size_price").hasClass("active") ){
                    return true;
                } else {
                    $(".size_price").css("box-shadow", "red 0px -1px 4px 0px inset");
                    $(".size_price").click(function(){
                        $(".size_price").css("box-shadow", "none");
                    })
                    return false;
                }
            });
        </script>


    <script>
        $(document).ready(function () {
            $('.first_item').trigger('click');
        });
    </script>

@stop




