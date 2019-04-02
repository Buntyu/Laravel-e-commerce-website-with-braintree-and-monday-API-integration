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
    <link rel="stylesheet" type="text/css" href="{{ asset('fullPage.js-master/jquery.fullPage.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fullPage.js-master/examples/examples.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('modal/remodal.css') }}">
    <link rel="stylesheet" href="{{ asset('modal/remodal-default-theme.css') }}">
</head>

<body class="backgrounds-fullpage">
@include('main-menu')
<div id="fullpage">
    <div class="section " id="section0">
        <video autoplay loop muted data-keepplaying poster="{{ asset('img/fullpage.png') }}" id="myVideo">
            <source src="{{ asset('video/CPS-v_slider.mp4') }}" type="video/mp4">
        </video>
        <div class="preloader-slider">
            <p class="preloader_title">Quality Canvas Prints You'll Love</p>
            <p class="preloader_descr">MADE IN MELBOURNE, FAST TURNAROUND &amp; CUSTOM SIZES AVAILABLE</p>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="slide" id="slide1">
            <div class="right-colmn">
                <div class="title"> How is our quality achieved? </div>
                <div class="number"> 01 </div>
                <img src="{{asset('img/bd-slider-mob/bd-slider1.jpg')}}" alt="">
                <div class="description">
                    <div class="text-head">Digitally Preparing Images</div>
                    <div class="dist_from_arr">We review and digitally prepare each image to guarantee you receive the best result. At no extra cost we can improve image resolution, colour, contrast and provide basic retouching.</div>
                </div>
            </div>
        </div>
        <div class="slide" id="slide2">
            <div class="right-colmn">
                <div class="title"> How do we achieve such quality? </div>
                <div class="number"> 02 </div>
                <img src="{{asset('img/bd-slider-mob/bd-slider2.jpg')}}" alt="">
                <div class="description">
                    <div class="text-head">Premium Materials</div>
                    <div class="dist_from_arr">Our premium archival canvas and genuine Canon inks will ensure your print is visually superior to other canvas prints.</div>
                </div>
            </div>
        </div>
        <div class="slide" id="slide3">
            <div class="right-colmn">
                <div class="title"> How do we achieve such quality? </div>
                <div class="number"> 03 </div>
                <img src="{{asset('img/bd-slider-mob/bd-slider3.jpg')}}" alt="">
                <div class="description">
                    <div class="text-head">Hand Crafted</div>
                    <div class="dist_from_arr">Unlike many common canvas printers, our prints are precisely stretched by hand with expertise and care. Each frame is custom made using kiln-dried timber stretcher bars, sourced from sustainable regrowth forests.</div>
                </div>
            </div>
        </div>
        <div class="slide" id="slide4">
            <div class="right-colmn">
                <div class="title"> How do we achieve such quality? </div>
                <div class="number"> 04 </div>
                <img src="{{asset('img/bd-slider4.jpg')}}" alt="">
                <div class="description">
                    <div class="text-head">UV Protective Coating</div>
                    <div class="dist_from_arr">Every print is carefully sprayed with a UV matte protective laminate, ensuring they are fade-resistant, durable and easy to clean.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="desctop_block">
            <div class="block block1">
                <div class="description">
                    <div class="description-inner"> <a href="{{url('print-your-own')}}" class="title-land">Print your own</a>
                        <div class="text"> Do you have an image you'd
                            <br> like to print? </div> <a href="{{url('print-your-own')}}" class="to-land">Find out more</a> </div>
                </div>
            </div>
            <div class="block block2">
                <div class="description">
                    <div class="description-inner"> <a href="{{url('gallery')}}" class="title-land">Artist gallery</a>
                        <div class="text"> Looking for art? Browse our gallery
                            <br> of local and international artists. </div> <a href="{{url('gallery')}}" class="to-land">View Gallery</a> </div>
                </div>
            </div>
            <div class="block block3">
                <div class="description">
                    <div class="description-inner"> <a href="{{url('commercial-printing')}}" class="title-land">Commercial Printing</a>
                        <div class="text"> Are you looking for a quality product and service?
                            <br> We are all you need to get the job done. </div> <a href="{{url('commercial-printing')}}" class="to-land">Learn more</a> </div>
                </div>
            </div>
        </div>
        <div class="mobile_block">
            <div class="slide"></div>
            <div class="slide"></div>
            <div class="slide"></div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="content-inner">
            <div class="section1"> <img src="{{ asset('img/what-sets-us.jpg') }}" alt="">
                <p> For me, this doesn’t feel like a business. When friends and clients come to visit my print studio, they often tell me it feels more like a home. I’m pleased to know that I’ve created a warm and welcoming space, one that reflects my personality and makes my customers feel comfortable and relaxed about a process that is often unknown and sometimes daunting. <a href="#read" class="more">Read more...</a> </p>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="contact-section">
            <div class="left">
                <div class="title">Contact us</div>
                <form action="{{url('/')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="concact-position">
                        <div class="label">
                            <label for="#name">Name</label>
                            <label for="#mail">Email</label>
                            <label for="#phone">Phone</label>
                        </div>
                        <div class="input">
                            <input type="text" name="name" id="name" placeholder="First and Last name" required>
                            <input type="email" name="email" id="mail" placeholder="Email" required>
                            <input type="tel" name="phone" id="phone" placeholder="Phone" required> </div>
                        <div class="checkbox_group">
                            <div class="checkbox_item">
                                <input type="checkbox" id="c1" name="cc[]" value="Custom size"/>
                                <label for="c1"> <span></span> Custom size </label>
                            </div>
                            <div class="checkbox_item">
                                <input type="checkbox" id="c2" name="cc[]" value="Review my image"/>
                                <label for="c2"> <span></span> Review my image </label>
                            </div>
                            <div class="checkbox_item">
                                <input type="checkbox" id="c3" name="cc[]" value="Artist Gallery"/>
                                <label for="c3"> <span></span> Artist Gallery </label>
                            </div>
                            <div class="checkbox_item">
                                <input type="checkbox" id="c4" name="cc[]" value="Commercial printing"/>
                                <label for="c4"> <span></span> Commercial printing </label>
                            </div>
                            <div class="checkbox_item">
                                <input type="checkbox" id="c5" name="cc[]" value="Other"/>
                                <label for="c5"> <span></span> Other </label>
                            </div>
                        </div>
                    </div>
                    <div class="concact-position">
                        <textarea name="notes" id="" placeholder="Message"></textarea>
                        <div class="fileform"> Attach file
                            <input id="upload" type="file" name="upload"><span class="if-upload" style="font-size: 15px; display:none;">&nbsp &nbsp &#10004;</span> </div>
                        <input type="submit" value="Send">
                    </div>
                </form>
                <div class="bottom-info">
                    <div class="info info-left">
                        <div class="text">Appointment Only</div>
                        <div class="text">1/10-12 Moreland Rd Brunswick East, 3057</div>
                        <div class="text">0401 803 186</div> <a href="mailto:print@canvasprintstudio.com.au">
                            print@canvasprintstudio.com.au
                        </a> </div>
                    <div class="info info-right"> <img src="{{ asset('img/contact.png') }}" alt=""> </div>
                </div>
            </div>
            <div class="right">
                <!--              id="map"-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.3961246778063!2d144.97675695058112!3d-37.75730897966332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad644a15fa4c8f5%3A0x6c6d47f7e06d4e03!2zMTAvMTIgTW9yZWxhbmQgUmQsIEJydW5zd2ljayBFYXN0IFZJQyAzMDU3LCDQkNCy0YHRgtGA0LDQu9C40Y8!5e0!3m2!1sru!2sua!4v1492010672566"  frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-inner">
        <div class="bottom">
            <div class="box_group">
                <div class="box icons">
                    <a href="{{$global_setting->facebook}}"> <img src="{{ asset('img/landing-icons-facebook.png') }}" alt=""> </a>
                    <a href="{{$global_setting->google}}"> <img src="{{ asset('img/landing-icons-google.png') }}" alt=""> </a>
                    <a href="{{$global_setting->instagram}}"> <img src="{{ asset('img/landing-icons-instagram.png') }}" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--модалка -->
<div class="remodal" data-remodal-id="read" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <div class="remodal-inner">
        <div class="read-block">

            <p сlass="text"> For me, this doesn’t feel like a business. When friends and clients come to visit my print studio, they often tell me it feels more like a home. I’m pleased to know that I’ve created a warm and welcoming space, one that reflects my personality and makes my customers feel comfortable and relaxed about a process that is often unknown and sometimes daunting.</p>

            <p сlass="text"> Helping my customers to preserve and cherish their special memories is a huge part of why I do what I do, it makes the whole process worthwhile to me. It brings out my sentimental side because I know how special the piece will be to the person. </p>

            <p сlass="text"> My work allows me to be really generous towards others and I love that I am able to help bring people’s imagery to life. Creating a product that is made with love, and offering genuine and honest service, makes me feel really happy to do what I do. </p>

            <p сlass="text"> In the greater scheme of things, it’s not making a huge impact in the world, but for me it’s the little things in life. Helping another person create something that is meaningful and precious to them - this is what makes all the difference to me. </p>

        </div>
    </div>
</div>

<!--модалка - кінець-->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!--    sssssssssssssssdddddddddddddddssssssseeeeeeeeew-->
<script type="text/javascript" src="{{asset('fullPage.js-master/jquery.fullPage.js')}}"></script>
<script src="{{asset('modal/remodal.js')}}"></script>
<script>
    jQuery(function ($) {
        $('#upload').change(function () {
            $('.if-upload').show();
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
        $(".burger .menu  a").click(function () {
            $('.burger .navigation ').removeClass('open');
        })
    });
</script>
<script>
    var SCROLLING_SPEED = 700;
    $(document).ready(function () {
        var w_size = $(document).width();
        if (w_size <= 1024) {
            $('#fullpage').fullpage({
                slidesNavigation: true,
                navigation: true
                , navigationPosition: 'right'
                , 'verticalCentered': false
                , scrollingSpeed: SCROLLING_SPEED
                , afterResize: function() {
                    var w_size = $(document).width();
                    var block_height = $(window).height();
                    if (w_size <= 1024) {
                        $("#section1 .slide").css("height", block_height);
                        $("#section2 .slide").css("height", block_height);

                        setTimeout(function() {
                            var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                            var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                            var sl1 = sl1_block_height + sl1_top + 50;
                            $(".fp-controlArrow").css({
                                "top": sl1,
                                "opacity": "1"
                            });
                        }, 1500);
                        $(".fp-controlArrow").css("opacity", "0");
                    }
                },
                afterLoad: function(anchorLink, index){
                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl1 = sl1_block_height + sl1_top + 50;
                    $(".fp-controlArrow").css("top", sl1);
//                        var loadedSection = $(this);
                },
                onSlideLeave: function (anchorLink, index, slideIndex, direction) {
                    $.fn.fullpage.setScrollingSpeed(700);
                    $('.fp-section').find('.fp-slidesContainer').hide();
                }
                , afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
                    $('.fp-section').find('.fp-slidesContainer').fadeIn(100);
                    $.fn.fullpage.setScrollingSpeed(SCROLLING_SPEED);

                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl2_block_height = $('#section1 #slide2 .dist_from_arr').height();
                    var sl3_block_height = $('#section1 #slide3 .dist_from_arr').height();
                    var sl4_block_height = $('#section1 #slide4 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl2_top = $('#section1 #slide2 .dist_from_arr').offset().top;
                    var sl3_top = $('#section1 #slide3 .dist_from_arr').offset().top;
                    var sl4_top = $('#section1 #slide4 .dist_from_arr').offset().top;

                    var sl1 = sl1_block_height + sl1_top + 50;
                    var sl2 = sl2_block_height + sl2_top + 50;
                    var sl3 = sl3_block_height + sl3_top + 50;
                    var sl4 = sl4_block_height + sl4_top + 50;

                    if (slideIndex == 0) {
                        $(".fp-controlArrow").css("top", sl1);
//                            alert(1);
                    }
                    if (slideIndex == 1) {
                        $(".fp-controlArrow").css("top", sl2);
//                            alert(2);
                    }
                    if (slideIndex == 2) {
                        $(".fp-controlArrow").css("top", sl3);
//                            alert(3);
                    }
                    if (slideIndex == 3) {
                        $(".fp-controlArrow").css("top", sl4);
//                            alert(4);
                    }
                }
                , onLeave: function (index, nextIndex, direction) {
                    if (nextIndex == 3) {
                        $("#fp-nav ul li a span").css("border-color", "#fff");
                    }
                    else {
                        $(" #fp-nav ul li a span").css("border-color", "#586376");
                    }
                    if ((nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $("footer").css("display", "none");
                    }
                    else {
                        $("footer").css("display", "flex");
                    }
                }
            });
        }
        else {
            $('#fullpage').fullpage({
                slidesNavigation: true,
                verticalCentered: false
                , anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage', '5thPage']
                , sectionsColor: ['#fff', '#fff', '#fff']
                , navigation: true
                , navigationPosition: 'right'
                , index: '0'
                , scrollingSpeed: SCROLLING_SPEED
                , afterResize: function(){
                    var w_size = $(document).width();
                    var block_height = $(window).height();
                    if (w_size <= 1024) {
                        $("#section1 .slide").css("height", block_height);
                        $("#section2 .slide").css("height", block_height);

                        setTimeout(function() {
                            var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                            var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                            var sl1 = sl1_block_height + sl1_top + 80;
                            $(".fp-controlArrow").css({
                                "top": sl1,
                                "opacity": "1"
                            });
                        }, 1500);
                        $(".fp-controlArrow").css("opacity", "0");
                    }
                },
                afterLoad: function(anchorLink, index){
                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl1 = sl1_block_height + sl1_top + 80;
                    $(".fp-controlArrow").css("top", sl1);
//                        var loadedSection = $(this);
                },
                onSlideLeave: function (anchorLink, index, slideIndex, direction) {
                    $.fn.fullpage.setScrollingSpeed(0);
                    $('.fp-section').find('.fp-slidesContainer').hide();
                },
                afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
                    $('.fp-section').find('.fp-slidesContainer').fadeIn(300);
                    $.fn.fullpage.setScrollingSpeed(SCROLLING_SPEED);

                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl2_block_height = $('#section1 #slide2 .dist_from_arr').height();
                    var sl3_block_height = $('#section1 #slide3 .dist_from_arr').height();
                    var sl4_block_height = $('#section1 #slide4 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl2_top = $('#section1 #slide2 .dist_from_arr').offset().top;
                    var sl3_top = $('#section1 #slide3 .dist_from_arr').offset().top;
                    var sl4_top = $('#section1 #slide4 .dist_from_arr').offset().top;

                    var sl1 = sl1_block_height + sl1_top + 80;
                    var sl2 = sl2_block_height + sl2_top + 80;
                    var sl3 = sl3_block_height + sl3_top + 80;
                    var sl4 = sl4_block_height + sl4_top + 80;
//
                    if (slideIndex == 0) {
                        $(".fp-controlArrow").css("top", sl1);
//                            alert(1);
                    }
                    if (slideIndex == 1) {
                        $(".fp-controlArrow").css("top", sl2);
//                            alert(2);
                    }
                    if (slideIndex == 2) {
                        $(".fp-controlArrow").css("top", sl3);
//                            alert(3);
                    }
                    if (slideIndex == 3) {
                        $(".fp-controlArrow").css("top", sl4);
//                            alert(4);
                    }
                }
                , onLeave: function (index, nextIndex, direction) {
                    if (nextIndex == 3) {
                        $("#fp-nav ul li a span").css("border-color", "#fff");
                    }
                    else {
                        $(" #fp-nav ul li a span").css("border-color", "#586376");
                    }
                    if ((nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $("footer").css("display", "none");
                    }
                    else {
                        $("footer").css("display", "flex");
                    }
                    if ((nextIndex == 1) || (nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $.fn.fullpage.setAllowScrolling(false);
                        setTimeout('$.fn.fullpage.setAllowScrolling(true)', 1500);
                    }
                }
            });
            $(".fp-controlArrow").click(function () {
                $(".fp-controlArrow").hide(0).delay(800).show(0);
            })
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(".more").click(function () {
            $("#fp-nav").hide();
            var w_size = $(document).width();
            if (w_size <= 1024) {
                $.fn.fullpage.destroy('all');
            }
            $.fn.fullpage.setAllowScrolling(false);
        });
    });
</script>
<script>
    var SCROLLING_SPEED = 700;
    $(document).ready(function () {
        var w_size = $(document).width();
        if (w_size <= 1024) {
            $('#fullpage').fullpage({
                slidesNavigation: true,
                navigation: true
                , navigationPosition: 'right',
                anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage', '5thPage']
                , 'verticalCentered': false
                , scrollingSpeed: SCROLLING_SPEED
                , afterResize: function() {
                    var w_size = $(document).width();
                    var block_height = $(window).height();
                    if (w_size <= 1024) {
                        $("#section1 .slide").css("height", block_height);
                        $("#section2 .slide").css("height", block_height);

                        setTimeout(function() {
                            var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                            var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                            var sl1 = sl1_block_height + sl1_top + 50;
                            $(".fp-controlArrow").css({
                                "top": sl1,
                                "opacity": "1"
                            });
                        }, 1500);
                        $(".fp-controlArrow").css("opacity", "0");
                    }
                },
                afterLoad: function(anchorLink, index){
                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl1 = sl1_block_height + sl1_top + 50;
                    $(".fp-controlArrow").css("top", sl1);
//                        var loadedSection = $(this);
                },
                onSlideLeave: function (anchorLink, index, slideIndex, direction) {
                    $.fn.fullpage.setScrollingSpeed(700);
                    $('.fp-section').find('.fp-slidesContainer').hide();
                }
                , afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
                    $('.fp-section').find('.fp-slidesContainer').fadeIn(100);
                    $.fn.fullpage.setScrollingSpeed(SCROLLING_SPEED);

                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl2_block_height = $('#section1 #slide2 .dist_from_arr').height();
                    var sl3_block_height = $('#section1 #slide3 .dist_from_arr').height();
                    var sl4_block_height = $('#section1 #slide4 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl2_top = $('#section1 #slide2 .dist_from_arr').offset().top;
                    var sl3_top = $('#section1 #slide3 .dist_from_arr').offset().top;
                    var sl4_top = $('#section1 #slide4 .dist_from_arr').offset().top;

                    var sl1 = sl1_block_height + sl1_top + 50;
                    var sl2 = sl2_block_height + sl2_top + 50;
                    var sl3 = sl3_block_height + sl3_top + 50;
                    var sl4 = sl4_block_height + sl4_top + 50;

                    if (slideIndex == 0) {
                        $(".fp-controlArrow").css("top", sl1);
//                            alert(1);
                    }
                    if (slideIndex == 1) {
                        $(".fp-controlArrow").css("top", sl2);
//                            alert(2);
                    }
                    if (slideIndex == 2) {
                        $(".fp-controlArrow").css("top", sl3);
//                            alert(3);
                    }
                    if (slideIndex == 3) {
                        $(".fp-controlArrow").css("top", sl4);
//                            alert(4);
                    }
                }
                , onLeave: function (index, nextIndex, direction) {
                    if (nextIndex == 3) {
                        $("#fp-nav ul li a span").css("border-color", "#fff");
                    }
                    else {
                        $(" #fp-nav ul li a span").css("border-color", "#586376");
                    }
                    if ((nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $("footer").css("display", "none");
                    }
                    else {
                        $("footer").css("display", "flex");
                    }
                }
            });
        }
        else {
            $('#fullpage').fullpage({
                slidesNavigation: true,
                verticalCentered: false
                , anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage', '5thPage']
                , sectionsColor: ['#fff', '#fff', '#fff']
                , navigation: true
                , navigationPosition: 'right'
                , index: '0'
                , scrollingSpeed: SCROLLING_SPEED
                , afterResize: function(){
                    var w_size = $(document).width();
                    var block_height = $(window).height();
                    if (w_size <= 1024) {
                        $("#section1 .slide").css("height", block_height);
                        $("#section2 .slide").css("height", block_height);

                        setTimeout(function() {
                            var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                            var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                            var sl1 = sl1_block_height + sl1_top + 80;
                            $(".fp-controlArrow").css({
                                "top": sl1,
                                "opacity": "1"
                            });
                        }, 1500);
                        $(".fp-controlArrow").css("opacity", "0");
                    }
                },
                afterLoad: function(anchorLink, index){
                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl1 = sl1_block_height + sl1_top + 80;
                    $(".fp-controlArrow").css("top", sl1);
//                        var loadedSection = $(this);
                },
                onSlideLeave: function (anchorLink, index, slideIndex, direction) {
                    $.fn.fullpage.setScrollingSpeed(0);
                    $('.fp-section').find('.fp-slidesContainer').hide();
                },
                afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
                    $('.fp-section').find('.fp-slidesContainer').fadeIn(300);
                    $.fn.fullpage.setScrollingSpeed(SCROLLING_SPEED);

                    var sl1_block_height = $('#section1 #slide1 .dist_from_arr').height();
                    var sl2_block_height = $('#section1 #slide2 .dist_from_arr').height();
                    var sl3_block_height = $('#section1 #slide3 .dist_from_arr').height();
                    var sl4_block_height = $('#section1 #slide4 .dist_from_arr').height();
                    var sl1_top = $('#section1 #slide1 .dist_from_arr').offset().top;
                    var sl2_top = $('#section1 #slide2 .dist_from_arr').offset().top;
                    var sl3_top = $('#section1 #slide3 .dist_from_arr').offset().top;
                    var sl4_top = $('#section1 #slide4 .dist_from_arr').offset().top;

                    var sl1 = sl1_block_height + sl1_top + 80;
                    var sl2 = sl2_block_height + sl2_top + 80;
                    var sl3 = sl3_block_height + sl3_top + 80;
                    var sl4 = sl4_block_height + sl4_top + 80;
//
                    if (slideIndex == 0) {
                        $(".fp-controlArrow").css("top", sl1);
//                            alert(1);
                    }
                    if (slideIndex == 1) {
                        $(".fp-controlArrow").css("top", sl2);
//                            alert(2);
                    }
                    if (slideIndex == 2) {
                        $(".fp-controlArrow").css("top", sl3);
//                            alert(3);
                    }
                    if (slideIndex == 3) {
                        $(".fp-controlArrow").css("top", sl4);
//                            alert(4);
                    }
                }
                , onLeave: function (index, nextIndex, direction) {
                    if (nextIndex == 3) {
                        $("#fp-nav ul li a span").css("border-color", "#fff");
                    }
                    else {
                        $(" #fp-nav ul li a span").css("border-color", "#586376");
                    }
                    if ((nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $("footer").css("display", "none");
                    }
                    else {
                        $("footer").css("display", "flex");
                    }
                    if ((nextIndex == 1) || (nextIndex == 2) || (nextIndex == 3) || (nextIndex == 4) || (nextIndex == 5)) {
                        $.fn.fullpage.setAllowScrolling(false);
                        setTimeout('$.fn.fullpage.setAllowScrolling(true)', 1500);
                    }
                }
            });
            $(".fp-controlArrow").click(function () {
                $(".fp-controlArrow").hide(0).delay(800).show(0);
            })
        }
    });
</script>
<script>
    var w_size = $(document).width();
    var block_height = $(window).height();
    $(".contact-section .right iframe").css("height", block_height);
    $("#section1 .slide").css("height", block_height);
    $(".mobile_block").hide(0);
    if (w_size <= 1024) {
        $(".desctop_block").hide(0);
        $(".mobile_block").show(0);
        $(".desctop_block .block1").appendTo(".mobile_block .slide:first-child()");
        $(".desctop_block .block2").appendTo(".mobile_block .slide:nth-child(2)");
        $(".desctop_block .block3").appendTo(".mobile_block .slide:last-child()");
        $("#section1 .slide").css("height", block_height);
    }
    $("#section2 .slide").css("height", block_height);

    if (w_size <= 1024) {
        $("#slide1 .right-colmn .number").prependTo("#slide1 .text-head");
        $("#slide2 .right-colmn .number").prependTo("#slide2 .text-head");
        $("#slide3 .right-colmn .number").prependTo("#slide3 .text-head");
        $("#slide4 .right-colmn .number").prependTo("#slide4 .text-head");
    }
</script>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $(window).load(function () {
            $("#loader").delay(100).fadeOut('slow');
            $("#loader-wrapper").delay(50).fadeOut('slow');
        });
    });
</script>
</body>

</html>