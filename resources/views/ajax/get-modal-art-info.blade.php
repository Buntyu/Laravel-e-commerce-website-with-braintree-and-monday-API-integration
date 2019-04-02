<div class="image box"> <img src="{{asset('assets/upload')}}/{{$item->image}}" alt=""> </div>
<div class="text-colomn box">
    <form action="{{url('orders/upload-from-gallery')}}" method="post">
        {{csrf_field()}}
        <div class="select-main">
            <select name="sizes" required id="sources" class="modalcustom-select sources price-sel" placeholder="Select size">
                <option data-price="{{$item->price_s}}" value="S,cm,{{$item->size_s}},{{$item->price_s}},{{$item->border_price_s}}">{{$item->size_s}} S</option>
                <option data-price="{{$item->price_m}}" value="M,cm,{{$item->size_m}},{{$item->price_m}},{{$item->border_price_m}}">{{$item->size_m}} M</option>
                <option data-price="{{$item->price_l}}" value="L,cm,{{$item->size_l}},{{$item->price_l}},{{$item->border_price_l}}">{{$item->size_l}} L</option>
                <option data-price="{{$item->price_xl}}" value="XL,cm,{{$item->size_xl}},{{$item->price_xl}},{{$item->border_price_xl}}">{{$item->size_xl}} XL</option>
            </select>
        </div>
        <!--<div class="price"><sup>$</sup>{{$item->price_s}}</div>-->
        <div class="price"></div>
        <input type="hidden" name="photo" value="{{$item->image}}">
        <input type="hidden" name="price_artwork" value="{{$item->price}}">
        <input type="hidden" name="artist_id" value="{{$user->id}}">
        <input type="submit" value="Order Now">
        <div class="text">Proceed to checkout</div>
    </form>
    <div class="owner">
        <a href="" class="owner-box">
            <div class="person-img" style="background-image: url('{{asset('assets/upload')}}/{{$user->photo}}')"></div>
            <div class="person-name">
                <div class="name">{{$user->name}}</div>
                <div class="skill">{{$user->medium}}</div>
                <div class="location">{{$user->city_country}}</div>
            </div>
        </a>
        <div class="person-info">{{$user->bio}}</div>
        <div class="more"> <a href="" class="title">More works from {{$user->name}}</a> <a href="{{url('gallery')}}/{{$user->name}}" class="view-all">View all <img src="{{asset('img/arrow.png')}}" alt="" width="19px" height="15px"></a>
            <div class="gallery">
                @foreach($arts as $art)
                    <a href="" class="box-img"><img src="{{asset('assets/upload')}}/{{$art->image}}" alt=""></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<a href="#close-modal" rel="modal:close" class="close-modal ">Close</a>
<script>
    var w_size = $(document).width();
    if (w_size > 1280) {
        $('#ex1 form').submit(function (){
            if( $("#ex1 .custom-option").hasClass("selection") ){
                return true;
            } else {
                $("#ex1 .select-main").css("box-shadow", "red 0px 6px 15px -4px");
                $("#ex1 .custom-option").click(function(){
                    $("#ex1 .select-main").css("box-shadow", "none");
                })
                return false;
            }
        });
        $(".gallery-item").click(function(){
            $("#ex1 .select-main").css("box-shadow", "none");
        });

    }
</script>