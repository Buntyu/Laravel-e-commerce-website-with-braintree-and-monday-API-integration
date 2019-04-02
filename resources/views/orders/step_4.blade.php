@extends('orders/main_orders')

@section('style')
    <link rel="stylesheet" href="{{ asset('owl.carousel2/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
@stop
@section('active4')
    class="active"
@stop
@section('content')
    <div class="content-00 content-04-frame-float">
        <div class="content-inner">
            @include('orders/breadcrumbs')
            <a href="{{url('orders/step-5')}}" class="next-step">next step <i></i></a> <a href="{{url('orders/step-3')}}" class="next-step back-step "><i></i> step back </a>
            <div class="out_b_gallery">
                <a href="{{url('gallery')}}" class="back_gallery">
                    <div class="tooltip">
                        @if($checkFromGallery == true)
                            <span class="hint">Back to the Artist Gallery</span>
                        @endif
                        <div class="tooltiptext">Selected arts will be saved.</div>
                    </div>
                </a>
            </div>
            <!--        slider with all foto           -->
            <div id="sync0" class="loop owl-carousel owl-theme">

                    @foreach($images as $key => $img)
                        <a class="item item-upload-img @if($key == 0) first_item @endif" @if(isset($img['filter-img-src'])) data-image="{{asset('assets/upload/' . $img['filter-img-src'])}}" @else @if(isset($img['src_size_img'])) data-image="{{asset('assets/upload/' . $img['src_size_img'])}}" @else data-image="{{asset('assets/upload/' . $img['name'])}}" @endif @endif data-id="{{$key}}" data-border-price="{{$img['border_price']}}" @if(isset($img['border']) && $img['border'] != 'none') data-border="{{$img['border']}}" @endif>
                            <div class="items synced">
                                <div class="check">
                                    <div class="img" @if(isset($img['src_size_img'])) data-src="{{asset('assets/upload/' . $img['src_size_img'])}}" @else data-src="{{asset('assets/upload/' . $img['name'])}}" @endif  @if(isset($img['filter-img-src'])) style="background-image: url('{{asset('assets/upload/' . $img['filter-img-src'])}}')"  @else @if(isset($img['src_size_img'])) style="background-image: url('{{asset('assets/upload/' . $img['src_size_img'])}}')" @else style="background-image: url('{{asset('assets/upload/' . $img['name'])}}')" @endif  @endif></div>
                                    @if(isset($img['border']) && $img['border'] != 'none') <div class="ok-item"></div> @endif
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
                                        @if(isset($img['border']) && $img['border'] != 'none')
                                                Frame: {{$img['border']}} <br>
                                                Frame price: {{$img['border_price']}} <br>
                                            Total price: {{$img['border_price'] + $img['price']}} <br>

                                        @endif
                                            @if(isset($img['subject_removal']) && $img['subject_removal'] != null)
                                                Subject removal: {{$img['subject_removal']}} <br>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

            </div>
            <!--				slider  -   end       -->
            <button form="step4-form" class="btn_confirm">Сonfirm changes</button>
            <div class="inner_04">
                <div class="left-side">
                    <div class="title-frame-float"> Add a floating frame </div>
                    <form action="{{url('orders/step-4/select-border')}}" id="step4-form" method="post">
                        {{csrf_field()}}
                        <div class="radio_group">
                            <div class="radio_item">
                                <div class="tooltip">
                                    <input type="radio" id="r1" value="raw" name="border" class="brown" />
                                    <label for="r1"> <span></span> Raw </label>
                                    <div class="tooltiptext">
                                        <img class="border_img" src="{{asset('img/frame-float/raw.jpg')}}" alt="">
                                        <div class="description">Border raw</div>
                                        <div class="price">Select image</div>
                                    </div>
                                </div>
                            </div>
                            <div class="radio_item">
                                <div class="tooltip">
                                    <input type="radio" id="r2" value="white"  name="border" class="white" />
                                    <label for="r2"> <span></span> White </label>
                                    <div class="tooltiptext">
                                        <img class="border_img" src="{{asset('img/frame-float/white.jpg')}}" alt="">
                                        <div class="description">Border white</div>
                                        <div class="price">Select image</div>
                                    </div>
                                </div>
                            </div>
                            <div class="radio_item">
                                <div class="tooltip">
                                    <input type="radio" id="r3" value="black" name="border" class="black" />
                                    <label for="r3"> <span></span> Black </label>
                                    <div class="tooltiptext">
                                        <img class="border_img" src="{{asset('img/frame-float/black.jpg')}}" alt="">
                                        <div class="description">Border black</div>
                                        <div class="price">Select image</div>
                                    </div>
                                </div>
                            </div>
                            <div class="radio_item">
                                <input type="radio" checked id="r4" value="none" name="border" class="none" />
                                <label for="r4"> <span></span> None </label>
                            </div>
                        </div>
                        <input type="hidden" id="value-id" name="id" value="0">
                        <textarea name="border-additional-info" id="" placeholder="Provide any additional information here ..."></textarea>
                        <!--<input type="submit" name="accept" value="Accept">-->
                    </form>
                </div>
                <div class="right-side">
                    <img src="{{asset('img/02_slider.png')}}" id="main-image"  alt="" class="border_img">
                </div>
                <div class="photo_frame">
                    <div class="photo_difference">
                        <div class="dif_text"> Click on any picture to change frame float </div>
                    </div>
                </div>
            </div>
            <div class="bottom-info">
                <div class="section section1">
                    <div class="box">
                        <div class="title">Timber frames</div>
                        <div class="text">All frames are made with Victorian Ash hardwood. A darker Blackwood timber is available on request.</div>
                    </div>
                    <div class="box">
                        <div class="title">Painted Finish</div>
                        <div class="text">Black and white frames are painted and sealed using Porter’s original paints.</div>
                    </div>
                </div>
                <div class="section section2">
                    <div class="box">
                        <div class="title">Natural Timber</div>
                        <div class="text">Raw timber frames are coated with beeswax for a smooth finish.</div>
                    </div>
                    <div class="box">
                        <div class="title">Frame Specification</div>
                        <div class="text">
                            <div class="tooltip"> <span class="hint">Find out more</span>
                                <div class="tooltiptext"> Float frames come in slim, medium and wide frames. We recommend a slim frame for smaller canvases, but each frame is tailored to your needs. </div>
                            </div>
                        </div>
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

@section('modal')

@stop

@section('scripts')
    @if($open_modal == true)
    <!--модалка -->
    <div class="hint_wrapper">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="hello">Step 4 - Add a floating frame!</p>
                <p>Complete your canvas with a Victorian Ash hardwood frame (optional).</p>
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


            $('.item').click(function () {
                var img = $(this).attr('data-image');
                var border = $(this).attr('data-border');
                $('#main-image').attr('src', img);
                $('#value-id').val($(this).attr('data-id'));
                $('.price').empty().html('<sup>$</sup>' + $(this).attr('data-border-price'));
                if(border == 'raw'){
                    $('.brown').prop('checked', true);
                }else if(border == 'white'){
                    $('.white').prop('checked', true);

                }else if(border == 'black'){
                    $('.black').prop('checked', true);
                }else{
                    $('.none').prop('checked', true);
                }
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
                if ($('#sync0 .owl-item').length <= 6) {
                    $("#sync0 .owl-controls").addClass("hide_arrow");
                } else {
                    $("#sync0 .owl-controls").removeClass("hide_arrow");
                }
            } else {
                if ( (window_w < 1900) && (window_w >= 1600) ) {
                    if ($('#sync0 .owl-item').length <= 5) {
                        $("#sync0 .owl-controls").addClass("hide_arrow");
                    } else {
                        $("#sync0 .owl-controls").removeClass("hide_arrow");
                    }
                } else {
                    if ( (window_w < 1600) && (window_w >= 1100) ) {
                        if ($('#sync0 .owl-item').length <= 4) {
                            $("#sync0 .owl-controls").addClass("hide_arrow");
                        } else {
                            $("#sync0 .owl-controls").removeClass("hide_arrow");
                        }
                    } else {
                        if ( (window_w < 1100) && (window_w >= 700) ) {
                            if ($('#sync0 .owl-item').length <= 3) {
                                $("#sync0 .owl-controls").addClass("hide_arrow");
                            } else {
                                $("#sync0 .owl-controls").removeClass("hide_arrow");
                            }
                        } else {
                            if ( (window_w < 700) && (window_w >= 450) ) {
                                if ($('#sync0 .owl-item').length <= 2) {
                                    $("#sync0 .owl-controls").addClass("hide_arrow");
                                } else {
                                    $("#sync0 .owl-controls").removeClass("hide_arrow");
                                }
                            } else {
                                if ($('#sync0 .owl-item').length <= 1) {
                                    $("#sync0 .owl-controls").addClass("hide_arrow");
                                } else {
                                    $("#sync0 .owl-controls").removeClass("hide_arrow");
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
        });
    </script>
    <script>
        $(".border_img").css({
            "border-image-source": "none"
        });
        $(".border_img").removeClass("black-border");
        $(".brown").click(function () {
            $(".border_img").css({
                "border-image-source": "url(../img/border-brown.png)"
            });
            $(".border_img").removeClass("black-border");
        });
        $(".white").click(function () {
            $(".border_img").css({
                "border-image-source": "url(../img/border-white.png)"
            });
            $(".border_img").removeClass("black-border");
        });
        $(".black").click(function () {
            $(".border_img").css({
                "border-image-source": "url(../img/border-black.png)"
            });
            $(".border_img").addClass("black-border");
        });
        $(".none").click(function () {
            $(".border_img").css({
                "border-image-source": "none"
            });
            $(".border_img").removeClass("black-border");
        });
    </script>
    <script>
        $(document).on("click", "#sync0 .item", function() {
            $(".content-04-frame-float .photo_frame").hide(0);
            $(".content-04-frame-float .inner_04 .right-side").show(0);
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.first_item').trigger('click');
        });
    </script>
@stop


