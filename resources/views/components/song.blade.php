<div class="bg-dark text-white p-2 d-flex justify-content-between song rounded-4"
     data-song="{{asset("songs/" . $song ?? "")}}" data-artist="{{$artist}}" data-title="{{$title}}"
data-image="{{strlen($image) != 0 ? asset("img/songCovers/" . $image) : asset("img/cover.jpg")}}">
    <div class="d-flex gap-2">
        <img src="{{strlen($image) != 0 ? asset("img/songCovers/" . $image) : asset("img/cover.jpg")}}"
             height="150" width="150" class="object-fit-cover rounded-4">
        <div class="d-flex flex-column justify-content-center">
            <h3>{{$title ?? ""}}</h3>
            <h4>{{$artist ?? ""}}</h4>
        </div>
    </div>
    <div class="d-flex align-items-center">
        <h3>{{$date ?? ""}}</h3>
    </div>
    <div class="d-flex align-items-center">
        <h3><i class="fa-solid fa-ellipsis-vertical"></i></h3>
    </div>
</div>
