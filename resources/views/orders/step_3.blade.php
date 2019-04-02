@extends('orders/main_orders')

@section('style')
    <link rel="stylesheet" href="{{ asset('owl.carousel2/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="https://cssgram-cssgram.netdna-ssl.com/cssgram.min.css">
    <link rel="stylesheet" href="{{ asset('modal/remodal.css') }}">
    <link rel="stylesheet" href="{{ asset('modal/remodal-default-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
@stop
@section('active3')
    class="active"
@stop
@section('content')
    <div class="content-00 content-02-style-enhancements">
        <div class="content-inner">
            @include('orders/breadcrumbs')
            <a href="{{url('orders/step-4')}}" class="next-step">next step <i></i></a> <a href="{{url('orders/step-2')}}" class="next-step back-step "><i></i> step back </a>
            <!--        slider with all foto           -->
            <div class="inner-sldr-photo">
                <!--        slider with all foto           -->
                <div id="sync0" class="loop owl-carousel owl-theme">
                    @foreach($images as $key => $img)
                        @if(!isset($img['from-gallery']))
                        <a class="item item-upload-img @if($key == 0) first_item @endif" @if(isset($img['filter-img-src'])) data-image="{{asset('assets/upload/' . $img['filter-img-src'])}}" @else @if(isset($img['src_size_img'])) data-image="{{asset('assets/upload/' . $img['src_size_img'])}}" @else data-image="{{asset('assets/upload/' . $img['name'])}}" @endif @endif data-id="{{$key}}" data-option="@if(isset($img['additional_filter_option'])) {{$img['additional_filter_option'] }} @endif">
                            <div class="items synced">
                                <div class="check">
                                    <div class="img" @if(isset($img['src_size_img'])) data-src="{{asset('assets/upload/' . $img['src_size_img'])}}" @else data-src="{{asset('assets/upload/' . $img['name'])}}" @endif  @if(isset($img['filter-img-src'])) style="background-image: url('{{asset('assets/upload/' . $img['filter-img-src'])}}')"  @else @if(isset($img['src_size_img'])) style="background-image: url('{{asset('assets/upload/' . $img['src_size_img'])}}')" @else style="background-image: url('{{asset('assets/upload/' . $img['name'])}}')" @endif  @endif></div>
                                    @if(isset($img['filter-img-src']) || isset($img['additional_filter_option']) && $img['additional_filter_option'] != null ||  isset($img['subject_removal']) && $img['subject_removal'] != null) <div class="ok-item"></div> @endif

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
                                            Total price: {{$img['border_price'] + $img['price'] + $img['subject_removal']}} <br>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
                <!--				slider  -   end       -->
                <button form="step3-form" class="btn_confirm download" data-class="normal">Сonfirm changes</button>
                <div class="photo_outer">
                    <div class="photo_enhance">
                        <div class="photo_enhance-left">
                            <div class="photo-title"> Photo enhancements </div>
                            <div class="photo-group">
                                <form id="step3-form" action="{{url('orders/step-3/select-filter')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="filter-img-src" id="filter-img-src">
                                    <input type="hidden" id="value-id" name="id" value="0">
                                    <div class="checkbox_group">
                                        <div class="checkbox_item crop">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c4" name="additional_filter_option[]" value="Cropping"/>
                                                <label for="c4"> <span></span> Cropping <i>(free)</i> </label>
                                                <div class="tooltiptext"> Remove outer parts of your image to improve framing, accentuate subject matter, or change aspect ratio. </div>
                                            </div>
                                        </div>
                                        <div class="checkbox_item expo">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c6" name="additional_filter_option[]" value="Exposure correction"/>
                                                <label for="c6"> <span></span>Exposure correction <i>(free)</i> </label>
                                                <div class="tooltiptext"> Brighten or darken your image to enhance image clarity and add detail. </div>
                                            </div>
                                        </div>
                                        <div class="checkbox_item red_eyes">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c1" name="additional_filter_option[]" value="Red Eye Removal"/>
                                                <label for="c1"> <span></span> Red Eye Removal <i>(free)</i> </label>
                                                <div class="tooltiptext"> Corrects the undesirable effect of people appearing to have red eyes, caused by flash photography.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkbox_group">
                                        <div class="checkbox_item blow_up">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c2" name="additional_filter_option[]" value="Image Blow up"/>
                                                <label for="c2"> <span></span> Image Blow up <i>(free)</i> </label>
                                                <div class="tooltiptext"> Using software designed to improve image resolution, we can achieve a sharper finish on large prints. </div>
                                            </div>
                                        </div>
                                        <div class="checkbox_item sub_removal">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c5" name="additional_filter_option[]" value="Subject Removal"/>
                                                <label for="c5"> <span></span> Subject Removal <i>(<sup>$</sup>25)</i> </label>
                                                <div class="tooltiptext"> Remove an object, person, or date from a photo with content from the surrounding area. Basic edits: (free) </div>
                                            </div>
                                        </div>
                                        <div class="checkbox_item airbrush">
                                            <div class="tooltip">
                                                <input type="checkbox" id="c3" name="additional_filter_option[]" value="Airbrushing"/>
                                                <label for="c3"> <span></span> Airbrushing <i>(free)</i> </label>
                                                <div class="tooltiptext"> Remove unwanted skin blemishes or soften wrinkles to give your complexion a subtle and natural glow. Basic edits: (free) </div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea name="additional_filter_notes" id="" placeholder="Provide any additional information here..."></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="photo_enhance-right">
                            <div class="photo_difference">
                                <div class="dif_text"> Click on any enhancements to see difference </div>
                            </div> <img class="crop_img" src="{{asset('')}}img/photo-enhancements/crop.jpg" alt="">
                            <img class="expo_img" src="{{asset('img/photo-enhancements/expo.jpg')}}" alt="">
                            <img class="red_eyes_img" src="{{asset('img/photo-enhancements/red-eyes.jpg')}}" alt="">
                            <img class="blow_up_img" src="{{asset('img/photo-enhancements/Image-Blow-up.jpg')}}" alt="">
                            <img class="sub_removal_img" src="{{asset('img/photo-enhancements/Subject-Removal.jpg')}}" alt="">
                            <img class="airbrush_img" src="{{asset('img/photo-enhancements/Airbrushing.jpg')}}" alt=""> </div>
                    </div>
                </div>
            </div>
            <div class="bottom-info">
                <div class="section section1">
                    <div class="box">
                        <div class="title">Expert Advice</div>
                        <div class="text">We happily offer advice, and will reply to any questions you may have.</div>
                    </div>
                    <div class="box">
                        <div class="title">Genuine Canon</div>
                        <div class="text">Each canvas is printed using genuine Canon inks.</div>
                    </div>
                </div>
                <div class="section section2">
                    <div class="box">
                        <div class="title">Professional Retouching</div>
                        <div class="text">Advanced editing services are available.</div>
                    </div>
                    <div class="box">
                        <div class="title">Premium Canvas</div>
                        <div class="text">We print on archival premium grade canvas.</div>
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
            <div class="inner-sldr-photo">
                <figure><img src="{{asset('img/02_slider.png')}}" class="main-foto canvasgram_img" alt="Your image"></figure>
                <!--				slider                -->
                <div id="sync2" class="owl-carousel">
                    <div class="item synced">
                        <figure class="check normal" data-class="normal"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check _1977" data-class="_1977"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check aden" data-class="aden"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check amaro" data-class="amaro"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check brannan" data-class="brannan"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check brooklyn" data-class="brooklyn"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check clarendon" data-class="clarendon"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check earlybird" data-class="earlybird"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check gingham" data-class="gingham"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check hudson" data-class="hudson"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check inkwell" data-class="inkwell"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check kelvin" data-class="kelvin"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check lark" data-class="lark"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check lofi" data-class="lofi"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check maven" data-class="maven"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check mayfair" data-class="mayfair"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check moon" data-class="moon"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check nashville" data-class="nashville"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check perpetua" data-class="perpetua"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check reyes" data-class="reyes"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check rise" data-class="rise"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check slumber" data-class="slumber"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check stinson" data-class="stinson"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check toaster" data-class="toaster"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check valencia" data-class="valencia"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check walden" data-class="walden"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check willow" data-class="willow"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                    <div class="item">
                        <figure class="check xpro2" data-class="xpro2"> <img src="{{asset('img/02_slider.png')}}" class="canvasgram_img" alt=""> </figure>
                    </div>
                </div>
                <!--				slider  -   end       -->

                <!-- Canvas -->
                <div class="none">
                    <canvas id="download-canvas" width="890" height="592"></canvas>
                </div>
                <!-- End Canvas -->

                <div id="virtual">
                    <style id="virtual-style"></style>

                    <div id="virtual-image">
                        <img src="img.jpg" class="canvasgram_img" alt="Your image">
                    </div>
                </div>
                <div class="ddiv"></div>
            </div>
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal confirm-filter" data-remodal-id="read" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <p>Would you like to add a style filter?</p> <a href="">Yes</a> <a href="">No</a>
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
                <p class="hello">Step 3 - Select your style!</p>
                <p>Select a filter or photo enhancement (optional). Photo filters available at the
                    bottom of page.</p>
                <a class="ok">OK</a>
            </div>
        </div>
    </div>
    <!--модалка - кінець-->
    @endif
    <script src="{{ asset('modal/remodal.js') }}"></script>
    <script src="{{ asset('owl.carousel2/owl.carousel.js') }}"></script>
    <script src="{{ asset('owl.carousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/hints.js') }}"></script>
    <script>
        $(document).ready(function () {

            //slider foto
            $('.loop').owlCarousel({
                items: 6
                ,  margin: 5
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
            $("#sync0 .items").click(function () {
                $("#sync0 .items").removeClass("synced");
                $(this).toggleClass("synced");
            });

            //slider filters
            $('#sync2').owlCarousel({
                items: 10
                , nav: false
                , responsive: {
                    0: {
                        items: 2,
                        nav: true
                    }
                    , 350: {
                        items: 2,
                        nav: true
                    }
                    , 500: {
                        items: 3,
                        nav: true
                    }
                    , 700: {
                        items: 4,
                        nav: true
                    }
                    , 900: {
                        items: 5,
                        nav: true
                    }
                    , 1150: {
                        items: 6
                    }
                    , 1400: {
                        items: 7
                    }
                    , 1600: {
                        items: 8
                    }
                    , 1900: {
                        items: 10
                    }
                }
            });
            $("#sync2 .item").click(function () {
                $("#sync2 .item").removeClass("synced");
                $(this).toggleClass("synced");
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

    <!--  instagram  filters    -->
    <script src="https://cburgmer.github.io/rasterizeHTML.js/rasterizeHTML.allinone.js"></script>
    <script>
        $(document).ready(function() {
            $('.item-upload-img').click(function(){
                var option_add = $(this).attr('data-option');
                $('#c1').prop('checked', false);
                $('#c2').prop('checked', false);
                $('#c3').prop('checked', false);
                $('#c4').prop('checked', false);
                $('#c5').prop('checked', false);
                $('#c6').prop('checked', false);
                if(option_add.search( 'cropping' )  != -1){
                    //alert('1 true');
                    $('#c4').prop('checked', true);
                }
                if(option_add.search( 'exposure correction' )  != -1){
                    //alert('2 true');
                    $('#c6').prop('checked', true);
                }
                if(option_add.search( 'red eye removal' )  != -1){
                    //alert('3 true');
                    $('#c1').prop('checked', true);
                }
                if(option_add.search( 'image blow up' )  != -1){
                    //alert('4 true');
                    $('#c2').prop('checked', true);
                }
                if(option_add.search( 'subject removal' )  != -1){
                    //alert('5 true');
                    $('#c5').prop('checked', true);
                }
                if(option_add.search( 'airbrushing' )  != -1){
                    //alert('6 true');
                    $('#c3').prop('checked', true);
                }
                //alert(option_add);
                //$('input:checked').prop('checked', false);

                /*if(option_add.search( 'cropping' )  != -1){
                    //alert('1 true');
                    $('#c4').attr('checked', true);
                }
                if(option_add.search( 'exposure correction' )  != -1){
                    //alert('2 true');
                    $('#c6').attr('checked', true);
                }
                if(option_add.search( 'red eye removal' )  != -1){
                    //alert('3 true');
                    $('#c1').attr('checked', true);
                }
                if(option_add.search( 'image blow up' )  != -1){
                    //alert('4 true');
                    $('#c2').attr('checked', true);
                }
                if(option_add.search( 'subject removal' )  != -1){
                    //alert('5 true');
                    $('#c5').attr('checked', true);
                }
                if(option_add.search( 'airbrushing' )  != -1){
                    //alert('6 true');
                    $('#c3').attr('checked', true);
                }*/
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('figure').click(function() {
                var foto = $(".main-foto");
                $(foto).parent().removeClass();
                var figure_class = $(this).attr("data-class");
                $(foto).parent().addClass(figure_class);
                $(".download").attr("data-class", figure_class);

                var image_width = document.querySelector('.main-foto').naturalWidth;
                var image_height = document.querySelector('.main-foto').naturalHeight;

                $("#virtual-style").empty();
                var css_class_name = $(this).attr('data-class');
                var css_class_path = '{{asset('filter/')}}' + '/' + css_class_name + '.min.css';

                //Get CSS
                $.get( css_class_path ).done(function( data ) {
                    //Apply user selected CSS
                    $('#virtual-style').append(data);
                    $('#virtual-image').addClass(css_class_name);
                    $('#virtual-image').css({
                        "width": image_width,
                        "height": image_height
                    });

                    var canvas = document.getElementById("download-canvas"),
                            context = canvas.getContext("2d"),
                            html_container = document.getElementById("virtual"),
                            html = html_container.innerHTML;
                    canvas.width = image_width;
                    canvas.height = image_height;


                    rasterizeHTML.drawHTML(html, canvas, canvas.width, canvas.height).then(function (renderResult) {

                        context.drawImage(renderResult.image, -10, -10, image_width+10, image_height+20);
                        var dataURL = canvas.toDataURL("image/png");
                        var postData = "canvasData="+dataURL;
                        $('#filter-img-src').val(postData);

                    });
                });
            });

            var img_source = $('.main-foto').attr("src");
            $('#virtual-image img').attr("src", img_source);

            $(document).on('click', '#sync0 .synced', function () {
                var rez = $("#sync0 .synced .img").attr("data-src");
                //a lert($(this).find(".img").css("background-image"));
                /*var newsource = $(this).find(".img").css("background-image");

                 var deltext1 = "url(\"";
                 var deltext2 = "\"\)";

                 var notrez = newsource.replace(deltext1,"");
                 var rez = notrez.replace(deltext2,"");
                 */
                //$('#virtual-image img').attr("src", rez);
                $('.canvasgram_img').attr("src", rez);
            });

            $('.item-upload-img').click(function () {

                $('#value-id').val($(this).attr('data-id'));
            });

            $('.normal').click(function () {

                $('#filter-img-src').val('');
            });

        });
    </script>
    <script>

        var window_w = $(document).width();
        if ( window_w > 1024 ) {
            $(".crop").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .crop_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .crop_img").css('display', "none");
            });

            $(".expo").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .expo_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .expo_img").css('display', "none");
            });

            $(".red_eyes").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .red_eyes_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .red_eyes_img").css('display', "none");
            });

            $(".blow_up").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .blow_up_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .blow_up_img").css('display', "none");
            });

            $(".sub_removal").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .sub_removal_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .sub_removal_img").css('display', "none");
            });

            $(".airbrush").hover(function () {
                $(".photo_difference").css('display', "none");
                $(".photo_enhance-right .airbrush_img").css('display', "block");
            }, function(){
                $(".photo_difference").css('display', "flex");
                $(".photo_enhance-right .airbrush_img").css('display', "none");
            });
        } else {
            $(".crop").click(function () {
                if ($(".crop input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .crop_img").css('display', "block");

                    $(".photo_enhance-right .expo_img").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "none");
                }
                else {
                }
            });

            $(".expo").click(function () {
                if ($(".expo input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .expo_img").css('display', "block");

                    $(".photo_enhance-right .crop_img").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "none");
                }
                else {
                }
            });

            $(".red_eyes").click(function () {
                if ($(".red_eyes input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "block");

                    $(".photo_enhance-right .crop_img").css('display', "none");
                    $(".photo_enhance-right .expo_img").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "none");
                }
                else {
                }
            });

            $(".blow_up").click(function () {
                if ($(".blow_up input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "block");

                    $(".photo_enhance-right .crop_img").css('display', "none");
                    $(".photo_enhance-right .expo_img").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "none");
                }
                else {
                }
            });

            $(".sub_removal").click(function () {
                if ($(".sub_removal input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "block");

                    $(".photo_enhance-right .crop_img").css('display', "none");
                    $(".photo_enhance-right .expo_img").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "none");
                }
                else {
                }
            });

            $(".airbrush").click(function () {
                if ($(".airbrush input[type='checkbox']").prop('checked') == true) {

                    $(".photo_difference").css('display', "none");
                    $(".photo_enhance-right .airbrush_img").css('display', "block");

                    $(".photo_enhance-right .crop_img").css('display', "none");
                    $(".photo_enhance-right .expo_img").css('display', "none");
                    $(".photo_enhance-right .red_eyes_img").css('display', "none");
                    $(".photo_enhance-right .blow_up_img").css('display', "none");
                    $(".photo_enhance-right .sub_removal_img").css('display', "none");
                }
                else {
                }
            });
        }


    </script>
    <script>
        $(document).ready(function () {
            $('.first_item').trigger('click');
        });
    </script>
@stop