@extends('personal-account/main_personal_account')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dragndrop.css') }}" />
    <link rel="stylesheet" href="{{asset('css/hints.css')}}">
@stop

@section('content')
    <div class="right_side-myartworks-money">
        <div class="title-artworks"> Upload Artwork </div>
        <form action="{{url('my-account/add-artwork')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form_box">
                <div class="label">
                    <label for="title">Artwork title</label>
                    <label for="category">Style</label>
                </div>
                <div class="input">
                    <input type="text" name="title" id="title" required>
                    <div class="select-main">
                        <select name="style" id="category" class="custom-select sources" placeholder="Select category">
                            <option value="Fine Art">Fine Art</option>
                            <option value="Abstract">Abstract</option>
                            <option value="Impressionism">Impressionism</option>
                            <option value="Street art">Art Deco</option>
                            <option value="Street art">Street art</option>
                            <option value="Illustration">Illustration</option>
                            <option value="Contemporary">Contemporary</option>
                            <option value="Photography">Photography</option>
                            <option value="Mixed media">Mixed media</option>
                            <option value="Minimalism">Minimalism</option>
                            <option value="Pop art">Pop art</option>
                            <option value="Collage">Collage</option>
                            <option value="Digital">Digital</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form_box">
                <div class="label">
                    <label for="#size_s">Price size S</label>
                    <label for="#size_m">Price size M</label>
                </div>
                <div class="input input_s">
                    <input type="text" id="size_s" name="desired_price_s" required>
                    <input type="text" id="size_m" name="desired_price_m" required>
                </div>
            </div>
            <div class="form_box">
                <div class="label">
                    <label for="#size_l">Price size L</label>
                    <label for="#size_xl">Price size XL</label>
                </div>
                <div class="input input_s">
                    <input type="text" id="size_l" name="desired_price_l" required>
                    <input type="text" id="size_xl" name="desired_price_xl" required>
                </div>
            </div>
            <div class="form_box form_box_custom">
                <div class="checkbox_group">
                    <div class="checkbox_item">
                        <input type="checkbox" id="c1" name="cc" />
                        <label for="c1"> <span></span> Are you interested in selling orginals? <a href="">Pricings</a> </label>
                    </div>
                </div>
                <div class="form_item form_item1">
                    <div class="label">
                        <label for="price_o">Price Original</label>
                    </div>
                    <div class="input input_s">
                        <input type="text" id="price_o" name="price" >
                    </div>
                </div>
                <div class="form_item">
                    <div class="label">
                        <label for="size_o">Size Original</label>
                    </div>
                    <div class="input input_s">
                        <input type="text" id="size_o" name="size" >
                    </div>
                </div>
                <div class="form_box">
                    <div class="label">
                        <label for="category">Subject</label>
                    </div>
                    <div class="input">
                        <div class="select-main">
                            <select name="subject" id="category" class="custom-select sources" placeholder="Select category">
                                <option value="Portrait">Portrait</option>
                                <option value="Landscape">Landscape</option>
                                <option value="Still life">Still life</option>
                                <option value="Nature">Nature</option>
                                <option value="Beach">Beach</option>
                                <option value="Animal">Animal</option>
                                <option value="Architecture">Architecture</option>
                                <option value="B+W">B+W</option>
                                <option value="City">City</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Landmarks">Landmarks</option>
                            </select>
                        </div>
                    </div>

                </div>



            </div>




        <!--			drug and drop				-->

        <div class="drag-n-drop">
            <div class="left" id="html-uploaded-files">


            </div>
            <div class="drop-text">
                <div class="text"> <a class="fake-btn">Upload</a> your image or drag and drop </div>
                <div class="text"> You can also use
                    <a class="dropbox fake-btn" id="drop-button"></a>
                </div>
                <div class="format">jpg, tiff, png, psd, ai, eps are accepted file types</div>
            </div>
            <input type="hidden" id="files_dropbox" name="files_dropbox">
            <input type="file" class="file-input" id="upload" name="file">
        </div>
        <!--			drug and drop - end				-->

            <input type="submit" value="UPLOAD" class="upload">
        </form>

        <!--				-->
    </div>
@stop

@section('modal')
    <!--модалка -->
    <div class="hint_wrapper artworks_wrapper">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="title">Withdraw Money</p>
                <form action="" method="">
                    <div class="label">
                        <label for="#bsb">BSB</label>
                        <label for="#account">Account number</label>
                        <label for="#amount">The amount of money you need to withdraw</label>
                    </div>
                    <div class="input">
                        <input type="text" id="bsb" required>
                        <input type="text" id="account" required>
                        <input type="text" id="amount" required>
                    </div>
                </form>

                <button form="" type="submit" class="send">Send request</button>
                <a class="contact_help" href="">Contact us for help</a>
            </div>
        </div>
    </div>
    <!--модалка - кінець-->
@stop

@section('scripts')
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="vrew8hjhb3bzqlk"></script>
    <script src="{{asset('js/hints.js')}}"></script>
    <script>
        var w_size = $(document).width();
        if (w_size > 1280) {
            $('form').submit(function (){
                if( $(".custom-option").hasClass("selection") ){
                    return true;
                } else {
                    $(".select-main").css("box-shadow", "red 0px 6px 15px -4px");
                    $(".custom-option").click(function(){
                        $(".select-main").css("box-shadow", "none");
                    })

                    return false;
                }
            });
        }
    </script>
    <script>
        jQuery(function ($) {
            $('#c1').change(function () {
                if($(this).is(':checked') ){
                    $('#price_o').attr('required', 'required');
                    $('#size_o').attr('required', 'required');
                }else{
                    $('#price_o').removeAttr('required');
                    $('#size_o').removeAttr('required');
                }
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
        });
    </script>
    <script>

        options = {

            // Required. Called when a user selects an item in the Chooser.
            success: function(files) {

                $('#files_dropbox').val(files[0].link);
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
            multiselect: false, // or true

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

            $('#drop-button').click(function(){
                Dropbox.choose(options);
            });

        });
    </script>
    <!--	select   -->
    <script>
        var w_size = $(document).width();
        if (w_size > 1280) {
            $(".custom-select").each(function() {
                var classes = $(this).attr("class"),
                        id      = $(this).attr("id"),
                        name    = $(this).attr("name");
                var template =  '<div class="' + classes + '">';
                template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
                template += '<div class="custom-options">';
                $(this).find("option").each(function() {
                    template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
                });
                template += '</div></div>';

                $(this).wrap('<div class="custom-select-wrapper"></div>');
                $(this).hide();
                $(this).after(template);
            });
            $(".custom-option:first-of-type").hover(function() {
                $(this).parents(".custom-options").addClass("option-hover");
            }, function() {
                $(this).parents(".custom-options").removeClass("option-hover");
            });
            $(".custom-select-trigger").on("click", function() {
                $('html').one('click',function() {
                    $(".custom-select").removeClass("opened");
                });
                $(this).parents(".custom-select").toggleClass("opened");
                event.stopPropagation();
            });
            $(".custom-option").on("click", function() {
                $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
                $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
                $(this).addClass("selection");
                $(this).parents(".custom-select").removeClass("opened");
                $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
            });
        }
        else {
            $('.select-main').toggleClass('changed');
        }
    </script>
    <!--	select - end   -->
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
        });
        document.getElementById('upload').onchange = function() {
            if (this.files[0]) {
                document.getElementById('html-uploaded-files').innerHTML = '<div class="download-item"><div class="download-title" title=""> ' + this.files[0].name + ' </div><div class="progress"><div class="bar"></div></div></div>';
                $(".drag-n-drop .progress .bar").css("width", "100%");
            }

        };
    </script>
@stop
