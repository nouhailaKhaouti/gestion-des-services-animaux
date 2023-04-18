@include('user.head')
<!-- END nav -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v13.0" nonce="O4kRY8pl"></script>
<section class="ftco-section">
    <div class="container" align="center">
        @foreach($posts as $post)
        @if(session()->has('message2'))
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">
                x
            </button>

            {{session()->get('message2')}}

        </div>
        @endif
        <div class="col-md-8 col-xl-6 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle" src="profileimage/$post->user->image" alt="">
                                    <div class="ml-2">
                                        <p>{{$post->user->username}}</p>
                                        <p class="tx-11 text-muted">{{$post->created_at->format('M d,Y \a\t h:i a')}}</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                @include('user.sendemail')
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5> {{$post->tag}}
                            </h5>
                            <h4 class="mb-3 tx-14"> {{$post->status}}</h4>
                            <p class="mb-3 tx-14"> {{$post->description}}</p>

                            @include('user.imagesDisplay', ['images' => $post->images, 'post_id' => $post->id])
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">


                                <div class="fb-like" data-href="http://127.0.0.1:8000/post_display" data-width="" data-layout="button_count" data-action="like" data-size="large"></div>
                                <hr />
                                <hr />
                                @include('user.comment')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

@include('user.footer')
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>
@include('user.script')
</body>

</html>