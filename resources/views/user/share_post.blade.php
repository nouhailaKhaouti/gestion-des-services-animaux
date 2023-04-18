@include('user.navbar')
@include('user.head')
<main class="main" id="top">
    <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <div class="container">
            <div class="row min-vh-xl-100 min-vh-xxl-25">
                <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/kitten.jpg" alt="hero-header" width="600" height="600" style=" border-radius: 8px; " /></div>
                <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
                    <h1 class="fw-light font-base fs-6 fs-xxl-7"><strong> Share your pet daily life with us</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container" align="center">
            @if(session()->has('message2'))
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                {{session()->get('message2')}}
            </div>
            @endif
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-lg-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow card-span rounded-3">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img style="margin-bottom:10px;" class="h-10 w-10 rounded-full object-cover" src="profileimage/{{$post->user->image}}" href="">
                                        <div class="ml-2">
                                            <p> <strong><a href="{{url('user_profile',$post->user->id)}}"> {{$post->user->username}}</a> </strong> <br> {{$post->created_at}}</p>
                                        </div>
                                    </div>
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
                                <small class="float-right">
                                    <a style="color:#294F7B;  font-size: 15px;" class="button" href="/post/{{ $post -> id }}/like/">
                                        <ion-icon name="md-heart">Like</ion-icon>
                                    </a>
                                    <span class="comment-count btn btn-info btn-sm ">{{$post->likes}}</span>
                                    <a style="color:#294F7B;  font-size: 15px;" class="button" href="/post/{{ $post -> id }}/dislike/">
                                        <ion-icon name="md-heart">Unlike</ion-icon>
                                    </a>
                                </small>
                                &nbsp;
                                @include('user.comment')

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>

    @include('user.script')