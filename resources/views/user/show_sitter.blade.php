@include('user.navbar')
@include('user.head')

  <body>
    <main class="main" id="top">
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <div class="container">
          <div class="row min-vh-xl-100 min-vh-xxl-25">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/sitter.jpg" alt="hero-header" width="600"  style=" border-radius: 8px; height=200; " /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
              <h1 class="fw-light font-base fs-6 fs-xxl-7"><strong>Sitters </strong></h1>
            </div>
          </div>
        </div>
      </section>

<section class="py-5">
<div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/doctors-bg.png);background-position:top center;background-size:contain;">
</div>
<div class="container">
  <div class="row flex-center">
    <div class="col-xl-10 px-0">
      <div class="carousel slide" id="carouselExampleDark" data-bs-ride="carousel"><a class="carousel-control-prev carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></a>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
              @foreach($users as $user)
              <div class="col-md-4 mb-8 mb-md-0">
                <div class="card card-span h-100 shadow">
                  <div class="card-body d-flex flex-column flex-center py-5"><img src="profileimage/{{$user->image}}" width="128" alt="..." />
                    <h5 class="mt-3">{{$user->username}}</h5>
                    <p class="mb-0 fs-xxl-1">{{$user->country}},{{$user->city}}</p>
                    <p class="text-600 mb-4">{{$user->age}}</p>
                    <div class="text-center">
                      <button class="btn btn-outline-secondary rounded-pill" type="submit"> <a href="{{url('user_profile',$user->id)}}">View Profile</a></button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>




      @include('user.script')
