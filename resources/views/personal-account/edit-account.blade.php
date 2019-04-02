@extends('personal-account/main_personal_account')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dragndrop.css') }}" />
    <link rel="stylesheet" href="{{asset('css/hints.css')}}">
@stop

@section('content')
    <div class="right_side-myartworks-money right_side_edt">
        <div class="owner-box">
            <div class="person-img" style="background-image: url('{{asset('assets/upload')}}/{{$user->photo}}')"></div>
            <a href="" class="person-name"></a>
            <div class="fileform"> Change Profile Picture
                <input id="upload" form="edit-profile" type="file" name="upload">
            </div>
        </div>
        <form id="edit-profile" action="{{url('my-account/edit-profile')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="label">
                <label for="name">Your name</label>
                <label for="email">Email</label>
                <label for="phone">Phone</label>
                <label for="medium">Medium</label>
                <label for="city">City, Country</label>

                <label for="bio">Your biography</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" value="{{$user->name}}" required>
                <input type="text" id="email" name="email" value="{{$user->email}}" required>
                <input type="text" id="phone" name="phone" value="{{$user->phone}}" required>
                <input type="text" id="medium" name="medium" value="{{$user->medium}}" placeholder="Photography, illustration, painting, collage" required>
                <input type="text" id="city" name="city" value="{{$user->city_country}}" required>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <textarea style="width: 555px; height: 200px; display: block; clear: both;" name="bio" id="bio">{{$user->bio}}</textarea>
        </form>

        <button form="edit-profile" type="submit" class="upload">Save changes</button>
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
                <form id="withdraw" action="{{url('my-account/withdraw')}}" method="post">
                    {{csrf_field()}}
                    <div class="label">
                        <label for="#bsb">BSB</label>
                        <label for="#account">Account number</label>
                        <label for="#amount">The amount of money you need to withdraw</label>
                    </div>
                    <div class="input">
                        <input type="text" name="bsb" id="bsb" required>
                        <input type="text" name="account" id="account" required>
                        <input type="text" name="amount" id="amount" required>
                    </div>

                </form>

                <button form="withdraw" type="submit" class="send">Send request</button>
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
@stop
