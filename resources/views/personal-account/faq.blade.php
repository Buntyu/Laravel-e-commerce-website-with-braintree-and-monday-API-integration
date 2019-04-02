<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Resource-type" content="Document" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=nо">
    <title>my artworks FAQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> </head>

<body>
<div class="wrapper">
    @include('main-menu')
    <div class="content-myartworks">
        <div class="content-inner"> <a href="{{url('/my-account')}}" class="back">Back to profile</a>
            <div id="tabbed-nav">
                <ul>
                    <li> <a href="">
                            Our Pricing System
                        </a> </li>
                    <li> <a href="">
                            How It Works
                        </a> </li>
                    <li> <a href="">
                            Privacy Policy
                        </a> </li>
                    <li> <a href="">
                            User Agreement
                        </a> </li>
                </ul>
                <div class="right_side-FAQ">
                    <div>
                        <p> You can quickly get to Google every time you open your browser by making Google your homepage. </p>
                        <p> Change your homepage. If you don’t see your browser listed below, go to the “help” section of your browser and look for information about changing your browser’s homepage. </p>
                        <blockquote> Note: You can’t set a homepage for Google Chrome on a tablet or phone. </blockquote>
                        <ol>
                            <li> 1. In the top right corner of your computer’s browser, click the Chrome menu Menu>Settings. </li>
                            <li> 2. In the “Appearance” section, check the box next to Show home button. When the box is checked. </li>
                            <li> 3. You’ll see a web address below it. </li>
                            <li> 4. Click Change. </li>
                            <li> 5. Click Open this page and enter www.google.com in the text box. </li>
                            <li> 6. Click Ok. </li>
                        </ol>
                    </div>
                    <div>2</div>
                    <div>3</div>
                    <div>4 </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!--	tabs   -->
<link href="{{ asset('tabs/zozo.tabs.min.css') }}" rel="stylesheet">
<script src="{{ asset('tabs/zozo.tabs.min.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
        $("#tabbed-nav").zozoTabs({
            orientation: "vertical"
            , minWindowWidth: 1024
            , animation: {
                effects: "none"
            }
        })
    });
</script>
<!-- tabs - end-->
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
</body>

</html>