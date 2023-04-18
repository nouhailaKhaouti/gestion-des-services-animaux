<div id="carousel-demo" class="carousel slide" data-ride="carousel">
    <!-- Sliding images statring here -->
    <div class="carousel-inner">
        @if (is_array($images) || is_object($images))
        @foreach($images as $image)
        <div class="item">
            <img class="img-fluid" src="postimage/{{$image->image}}" alt="">
        </div>
        @endforeach
        @endif
        <div class="item">
            <video class="img-fluid" src="postvideo/{{$post->video}}" alt="">
        </div>
    </div>
    <!-- Next / Previous controls here -->
    <a class="left carousel-control" href="#carousel-demo" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-demo" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>

</div>

