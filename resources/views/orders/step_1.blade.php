@extends('orders/main_orders')


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('owl.carousel2/assets/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dragndrop.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hints.css') }}">
@stop
@section('active1')
    class="active"
@stop
@section('content')
    <div class="content-00 content-01-img-upload">
        <div class="content-inner">
            @include('orders/breadcrumbs')

             <a href="{{url('orders/step-2')}}" class="next-step"> next step  <i></i>
            </a>
            <!--        slider with all foto           -->
            @if(isset($images) and !empty($images))
            <div id="sync0" class="loop owl-carousel owl-theme">
                @foreach($images as $key => $img)

                    <div class="item ">
                        <div class="items synced">
                            <div class="check">
                                <div class="img" style="background-image: url('{{asset('assets/upload/' . $img['name'])}}')"></div>
                                <div class="text"> {{$img['name']}} </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            @endif
            <!--				slider  -   end       -->

            <form action="{{url('orders/step-1')}}" method="post" id="upload-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="drag-n-drop">
                    <div class="left">
                        <!--<button type="submit" class="btn_confirm">Upload</button>-->

                        <div id="html-uploaded-files"></div>
                        @if(isset($images) and !empty($images))
                            <div id="if-upload-img"></div>
                            @foreach($images as $key => $img)
                                <div class="download-item">
                                    <div class="download-title" title=""> {{$img['name']}} </div>
                                    <div class="progress">
                                        <div class="bar"></div>
                                    </div> <i class="del-img" data-id="{{$key}}"></i>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="drop-text">
                        <div class="text"> <a class="fake-btn">Upload</a> your image or drag and drop </div>
                        <div class="text"> You can also use
                            <a class="dropbox" id="drop-button"></a>
                        </div>
                        <div class="format">jpg, tiff, png, psd, ai, eps are accepted file types</div>
                    </div>
                    <input type="hidden" id="files_dropbox" name="files_dropbox">
                    <input class="file-input"  id="upload" type="file" name="orders-images[]" multiple>
                </div>



            </form>
            <div class="bottom-info">
                <div class="section section1">
                    <div class="box">
                        <div class="title">Flexible Payment Options</div>
                        <div class="text">Pay now or confirm and pay later.</div>
                    </div>
                    <div class="box">
                        <div class="title">Fast Turnaround</div>
                        <div class="text">Let us know if you need your print sooner. Our standard turnaround 5-7 business days. </div>
                    </div>
                </div>
                <div class="section section2">
                    <div class="box">
                        <div class="title">Pick up or Delivery</div>
                        <div class="text">Choose to pick up your canvas or have it delivered. </div>
                    </div>
                    <div class="box">
                        <div class="title">100% Satisfaction Guarantee</div>
                        <div class="text">If you are not entirely pleased with the outcome, we will gladly provide you with a print to your satisfaction.</div>
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
                    <p class="hello">Step1 - Upload your images!</p>
                    <p>For files larger than 30mb please contact us for a direct upload link.</p>
                    <a class="ok">OK</a>
                </div>
            </div>
        </div>
        <!--модалка - кінець-->
        @endif
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="vrew8hjhb3bzqlk"></script>
    <script src="{{ asset('owl.carousel2/owl.carousel.js') }}"></script>
    <script src="{{ asset('owl.carousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/hints.js') }}"></script>
    <script>

        options = {

            // Required. Called when a user selects an item in the Chooser.
            success: function(files) {
                var arr = [];
                for(var i = 0; i < files.length; i++){
                    arr.push(files[i].link);
                }
                $('#files_dropbox').val(arr.join(','));
                $('#upload-form').submit();

                //var msg = $('#drop-upload-form').serialize();


                /*$.ajax({
                    type: 'POST',
                    url: '/ajax/upload-from-dropbox/',
                    data: msg,
                    success: function(data1) {
                        alert(data1);
                    }
                });*/
                //alert("Here's the file link: " + files[0].link)
            },

            // Optional. Called when the user closes the dialog without selecting a file
            // and does not include any parameters.
            cancel: function() {

            },

            // Optional. "preview" (default) is a preview link to the document for sharing,
            // "direct" is an expiring link to download the contents of the file. For more
            // information about link types, see Link types below.
            linkType: "direct", // or "direct"

            // Optional. A value of false (default) limits selection to a single file, while
            // true enables multiple file selection.
            multiselect: true, // or true

            // Optional. This is a list of file extensions. If specified, the user will
            // only be able to select files with these extensions. You may also specify
            // file types, such as "video" or "images" in the list. For more information,
            // see File types below. By default, all extensions are allowed.
            extensions: ['.jpg', '.png', '.gif'],
        };
        //var button = Dropbox.createChooseButton(options);
        //document.getElementById("container").appendChild(button);
        //Dropbox.choose(options);

        jQuery(function ($) {
            $('#upload').change(function () {
                $('#upload-form').submit();
            });
            $('.del-img').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/ajax/delete-artwork-order/' + id
                }).done(function (html) {
                    location.reload();
                });
            });
            $('#drop-button').click(function(){
                Dropbox.choose(options);
            });
            if($("div").is("#if-upload-img")){
                var w_size = $(document).width();
                if (w_size <= 768) {
                    $('.drag-n-drop').css({
                        "flex-direction": 'column'
                        , "display": 'flex'
                        , "justify-content": 'space-around'
                    });
                }
                else {
                    $('.drag-n-drop').css({
                        "display": 'flex'
                        , "justify-content": 'space-around'
                        , "flex-direction": 'row'
                    });
                }
                $(".drag-n-drop .format").hide(0);
                $('.drag-n-drop .drop-text').css({
                    "bottom": '15px'
                    , "height": '47px'
                });
                $('.drag-n-drop .drop-text .text').css("margin", '0');
                $(".drag-n-drop .left").css('display', 'block');
                $(".drag-n-drop .right").css('display', 'block');
                $(".drag-n-drop .file-input").css('display', 'none');
                $(".drag-n-drop .progress .bar").css("width", "100%");
            }
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

                    $('.item').click(function () {
                        var img = $(this).attr('data-image');
                        $(".cropper-wrap-box").find("img").attr('src',img);
                        $(".cropper-crop-box").find("img").attr('src',img);
                        $('#image').attr('src',img);
                        $('#value-id').val($(this).attr('data-id'));
                    });

                    $('.size-type').click(function () {
                        $('#value-type').val($(this).attr('data-type'));
                    });
                    $('.size-unit').click(function () {
                        $('#value-unit').val($(this).attr('data-unit'));
                    });
                    $('.size_price').click(function () {
                        $('#value-size').val($(this).attr('data-size'));
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
        $(".drag-n-drop .fake-btn").click(function () {
            $(".drag-n-drop .file-input").trigger("click");

            var w_size = $(document).width();
            if (w_size <= 768) {
                $('.drag-n-drop').css({
                    "flex-direction": 'column'
                    , "display": 'flex'
                    , "justify-content": 'space-around'
                });
            }
            else {
                $('.drag-n-drop').css({
                    "display": 'flex'
                    , "justify-content": 'space-around'
                    , "flex-direction": 'row'
                });
            }
            $(".file-input").change(function () {
                $(".drag-n-drop .format").hide(0);
                $('.drag-n-drop .drop-text').css({
                    "bottom": '15px'
                    , "height": '47px'
                });
                $('.drag-n-drop .drop-text .text').css("margin", '0');
                $(".drag-n-drop .left").css('display', 'block');
                $(".drag-n-drop .file-input").css('display', 'none');
            })

        });
        $(".left i").click(function () {
            $(this).parent(".download-item").remove();
        })
    </script>
    <script>
        /*document.getElementById('upload').onchange = function() {
            if (this.files[0]) // если выбрали файл
                document.getElementById('html-uploaded-files').innerHTML = this.files[0].name;
        };*/
    </script>
@stop