@extends('personal-account/main_personal_account')

@section('style')
    <link rel="stylesheet" href="{{asset('css/hints.css')}}">
@stop

@section('content')
    <div class="right_side">
        <div class="title-artworks"> My artworks </div> <a href="{{url('my-account/add-artwork')}}" class="add-artworks">Add artwork</a>
        <div class="gallery">
            @forelse($artworks as $img)
                <a href="{{url('/my-account/edit-artworks')}}/{{$img->id}}" class="box-img"><img src="{{ asset('assets/upload/' . $img->image) }}" alt=""></a>
                @empty
            @endforelse
        </div>
        <div class="pagination">
            {{$artworks->links()}}
        </div>
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
    <!--<div class="hint_wrapper artworks_overview">
        <div class="hint_background"></div>
        <div class="hint_outside">
            <button class="hint_close"></button>
            <div class="hint_body">
                <p class="title">TERMS OF SERVICE</p>
                <p class="title title2">OVERVIEW</p>
                <p>This website is operated by Canvas Print Studio. Throughout the site, the terms “we”, “us” and “our” refer to Canvas Print Studio. Canvas Print Studio offers this website, including all information,copy tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
            </div>
        </div>
    </div>-->
    <!--модалка - кінець-->
    @stop
@section('scripts')

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

