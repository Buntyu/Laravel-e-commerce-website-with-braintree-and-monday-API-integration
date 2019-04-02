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