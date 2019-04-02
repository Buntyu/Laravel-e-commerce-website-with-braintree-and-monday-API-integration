<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <link rel="shortcut icon" href="{{ asset('img/landing-icons-facebook.png') }}favicon.ico">
    <title>Landing print gallery </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/assets/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.modal.css') }}" type="text/css" media="screen" /> </head>

<body>
<div class="wrapper wrapper-landings wrapper-gallery">
    @include('main-menu')
    <div class="content-landing">
        <div class="sub-header">
            <div class="sub-inner"> <a class="nav_land nav1" href="{{url('print-your-own')}}"><span>PRINT YOUR OWN</span></a> <a class="nav_land nav2 active" href="{{url('gallery')}}"><span class="active">PRINT FROM OUR GALLERY</span></a> <a class="nav_land nav3" href="{{url('commercial-printing')}}"><span>COMMERCIAL PRINTING</span></a> </div>
        </div>
        <div class="content-inner">
            <div class="section1">
                <h1>How It Works</h1>
                <p>Like a car that takes you across the country or world, they are useful, but like a car, they are only useful in certain ways, and you have to get out of them when you arrive at your various destinations.</p>
                <div class="group">
                    <!--		slider     	-->
                    <div id="slider1" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="box"> <img src="{{ asset('img/box5-landing.png') }}" alt="">
                                <div class="title">Select From Our Gallery</div>
                                <div class="description"> If your image dont have enough quality — we will improve it. </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box"> <img src="{{ asset('img/box2-landing.png') }}" alt="">
                                <div class="title">Select size</div>
                                <div class="description"> Choose any from preset or enter even your custom size. </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box"> <img src="{{ asset('img/box4-landing.png') }}" alt="">
                                <div class="title">Add Float Frame</div>
                                <div class="description"> We can print gift wrapped to your canvas. </div>
                            </div>
                        </div>
                    </div>
                    <!--		slider	- end	-->
                </div>
            </div>
            <div class="section2">
                <div class="section2-inner">
                    <div class="left">
                        <h1>Artist gallery</h1> <a class="view-all" href="{{url('/gallery')}}">
                            View all
                            <img src="{{ asset('img/arrow.png') }}" alt="" class="arrow">
                        </a>
                        <p>Like a car that takes you across the country or world, they are useful, but like a car, they are only useful in certain ways, and you have to get out of them when you arrive at your various destinations.</p>
                    </div>
                    <div class="right">
                        <div class="left_inner">
                            <div class="title">Want to join Our Gallery?</div>
                            <div class="text">or contact us for help</div>
                            <div class="text">0401 803 186</div> <a href="mailto:print@canvasprintstudio.com.au">print@canvasprintstudio.com.au</a> </div>
                        <div class="right_inner"> <img src="{{ asset('img/mail.png') }}" alt=""> </div>
                    </div>
                </div>
                <div class="gallery" id="gallery">
                    @foreach($artwork as $img)

                        <a href="#ex1" rel="modal:open" class="gallery-item" data-art-id="{{$img->id}}" data-user-id="{{$img->user_id}}"> <img src="{{ asset('assets/upload/' . $img->image) }}" alt=""> <span class="img_text">
								<span class="img_text_inner">
									<span class="name">
										{{$img->title}}
									</span> <span class="author">
										by {{$img->name}}
									</span> </span>
                            </span>
                        </a>
                    @endforeach

                </div> <a href="{{url('/gallery')}}" class="view-all-gallery">View all gallery <img src="{{ asset('img/arrow.png') }}" alt="" width="19px" height="15px"></a> </div>
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
    </div>
    <footer>
        <div class="footer-inner">
            <div class="top">
                <div class="footer-menu">
                    <ul>
                        <li><a href="index.html#section1">Our Quality</a></li>
                        <li><a href="landing-print-your-own.html">Print Your Own</a></li>
                        <li><a href="landing-print-gallery.html">Print From Gallery</a></li>
                        <li><a href="landing-print-commercial.html">Commercial Printing</a></li>
                        <li><a href="index.html#4thPage">What Sets Us Apart</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="box-center">
                    <div class="delivery box">
                        <div class="title"> Delivery </div>
                        <div class="text"> We use quality 100% cotton, bright white, matte canvas, designed to give optimum results for your canvas print. </div>
                    </div>
                    <div class="payment box">
                        <div class="title"> Payment </div>
                        <div class="text"> We use quality 100% cotton, bright white, matte canvas, designed to give optimum results for your canvas print. </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="box_group">
                    <div class="box terms"> <a href="">Terms and conditions</a> </div>
                    <div class="box privacy"> <a href="">Privacy Policy</a> </div>
                </div>
                <div class="box_group">
                    <div class="box icons">
                        <a href=""> <img src="{{ asset('img/landing-icons-facebook.png') }}" alt=""> </a>
                        <a href=""> <img src="{{ asset('img/landing-icons-google.png') }}" alt=""> </a>
                        <a href=""> <img src="{{ asset('img/landing-icons-instagram.png') }}" alt=""> </a>
                    </div>
                </div>
                <div class="box_group">
                    <div class="box copyright"> © Canvas Print Studio, 2016 </div>
                    <a class="box development" href="http://luft.tech/"> <span></span> Development & design by Luft </a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!--модалка -->
<div id="ex1" style="display:none;">
    <!--
    <div class="image box"> <img src="{{ asset('img/landing-gallery1.png') }}" alt=""> </div>
    <div class="text-colomn box">
        <form action="" method="post">
            <section class="main">
                <div class="wrapper-demo">
                    <div id="dd" class="wrapper-dropdown-3" tabindex="1"> <span>Select size</span>
                        <ul class="dropdown">
                            <li><a href="#">30x20 (A4)</a></li>
                            <li><a href="#">300x200 (A4)</a></li>
                            <li><a href="#">150x20 (A4)</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <div class="s-arrow">
                <select name="" id="">
                    <option value="">30x20 (A4)</option>
                    <option value="">300x200 (A4)</option>
                    <option value="">150x20 (A4)</option>
                </select>
            </div>
            <div class="price"><sup>$</sup>129</div>
            <input type="submit" value="Print">
            <div class="text">Proceed to checkout</div>
        </form>
        <div class="owner">
            <a href="" class="owner-box">
                <div class="person-img"></div>
                <div class="person-name">
                    <div class="name">Amanda Morie</div>
                    <div class="skill">Illustrator, photographer</div>
                </div>
            </a>
            <div class="person-info"> Amanda Morie’s award winning contemporary fine art is dynamic and vibrant. It makes use of different movements of color in various settings of light exposing the details that compose each emotion entangled with the beauty that is both within and surrounds us. Published worldwide she has been exhibited in North America, Europe and Australia. </div>
            <div class="more"> <a href="" class="title">More works from Amanda</a> <a href="" class="view-all">View all <img src="img/arrow.png" alt="" width="19px" height="15px"></a>
                <div class="gallery">
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                    <a href="" class="box-img"><img src="{{ asset('img/landing-person-gallery1.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>-->
</div>
<!--модалка - кінець-->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('owl.carousel/owl.carousel.js') }}"></script>
<link href="{{asset('tabs/zozo.tabs.min.css')}}" rel="stylesheet">
<script src="{{asset('tabs/zozo.tabs.min.js')}}"></script>
<script>
    jQuery(document).ready(function ($) {
        $("#tabbed-nav").zozoTabs({
            orientation: "vertical",
            defaultTab: 'none'
            , animation: {
                effects: "none"
            }
        })
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
    $(document).ready(function () {
        $(document).on('click', '.gallery-item', function(){
            var artid = $(this).attr('data-art-id');
            var userid = $(this).attr('data-user-id');
            $.ajax({
                url: '/ajax/get-modal-art-info?user-id=' + userid + '&art-id=' + artid
            }).done(function(data){
                $('#ex1').empty();
                $('#ex1').html(data);
            });
        });
        var owl1 = $("#slider1");
        owl1.owlCarousel({
            navigation: true
            , pagination: false
            , items: 3
            , itemsDesktop: [1440, 3]
            , itemsDesktopSmall: [1050, 3]
            , itemsTablet: [800, 2]
            , itemsTabletSmall: [640, 1]
            , });
    });
</script>
<script>
    //				для модалки img ----
    $(document).ready(function () {
        $(".content-landing .content-inner .section2 .gallery .gallery-item").click(function () {
            var pictr = $(this).children().attr("src");
            $("#ex1 .image img").attr("src", pictr);
        })
    });
</script>
<!--	gallery   -->
<script src="{{ asset('js/jquery.modal.js') }}" type="text/javascript" charset="utf-8"></script>
<!--	gallery - end  -- >

<!--	select  -->
<script type="text/javascript">
    function DropDown(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
    }
    DropDown.prototype = {
        initEvents: function () {
            var obj = this;
            obj.dd.on('click', function (event) {
                $(this).toggleClass('active');
                return false;
            });
            obj.opts.on('click', function () {
                var opt = $(this);
                obj.val = opt.text();
                obj.index = opt.index();
                obj.placeholder.text(obj.val);
            });
        }
        , getValue: function () {
            return this.val;
        }
        , getIndex: function () {
            return this.index;
        }
    }
    $(function () {
        var dd = new DropDown($('#dd'));
        $(document).click(function () {
            // all dropdowns
            $('.wrapper-dropdown-3').removeClass('active');
        });
    });
</script>
<script>
    var OSName = "Unknown OS";
    var w_size = $(document).width();
    if (w_size < 1280) {
        if (navigator.appVersion.indexOf("Mac") != -1) {
            OSName = "MacOS";
            if (OSName == "MacOS") {
                $('.s-arrow').css("display", 'block');
                $('.main').css("display", 'none');
            }
            else {
                $('.s-arrow').css("display", 'none');
                $('.main').css("display", 'block');
            }
        }
        if (navigator.appVersion.indexOf("Linux") != -1) {
            OSName = "Linux";
            if (OSName == "Linux") {
                $('.s-arrow').css("display", 'block');
                $('.main').css("display", 'none');
            }
            else {
                $('.s-arrow').css("display", 'none');
                $('.main').css("display", 'block');
            }
        }
    }
</script>
</body>

</html>