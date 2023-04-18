@include('user.navbar')
@include('user.head')
    <main class="main" id="top">
    <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <div class="container">
          <div class="row min-vh-xl-100 min-vh-xxl-25">
            <div style="margin-top:10px;" class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"  src="assets/img/gallery/cat.jpg" alt="hero-header" width="600" height="600" style=" border-radius: 8px; " />   </div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
              <h1 class="fw-light font-base fs-4 fs-xxl-7"><strong>Welcome to NF PETS </strong></h1> <br>
              <p class="fw-light font-base fs-1 fs-sm-2"> We care for lost dogs, cats and other companion animals. 
                We reunite lost pets with their families, find new homes for others, 
                and always seek the best possible outcomes for all animals that come into our care.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-12 py-3">
              <div class="bg-holder bg-size" style="background-position:top center;background-size:contain;">
              </div>
              <h1 class="text-center">Creators</h1>
            </div>
          </div>
        </div>
</section>
      <section class="py-8">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/people-bg-1.png);background-position:center;background-size:cover;">
        </div>
        <div class="container">
          <div class="row align-items-center offset-sm-1">
            <div class="carousel slide" id="carouselPeople" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <div class="row h-100">
                    <div class="col-sm-3 text-center"><img src="assets/img/gallery/nouha.jpg" alt="" style="width:200px; border-radius: 50%;" />
                      <p class="fw-normal mb-0"></p>
                    </div>
                    <div class="col-sm-9 text-center text-sm-start pt-3 pt-sm-0">
                    <h2 class="mt-3 fw-medium text-secondary">Nouhaila Khaouti</h2>
                      <div class="my-2"></div>
                      <p> 21 years old from Marrakech, Morocco.</p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row h-100">
                    <div class="col-sm-3 text-center"><img src="assets/img/gallery/fati.jpg" alt="" style="width:200px;  border-radius: 50%;" />
                      <p class="fw-normal mb-0"></p>
                    </div>
                    <div class="col-sm-9 text-center text-sm-start pt-3 pt-sm-0">
                    <h2 class="mt-3 fw-medium text-secondary">Fatima-ezzahra Mendada</h2>
                      <div class="my-2"></div>
                      <p> 22 years old from Marrakech, Morocco.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="position-relative z-index-2 mt-5">
                  <ol class="carousel-indicators">
                    <li class="active" data-bs-target="#carouselPeople" data-bs-slide-to="0"></li>
                    <li data-bs-target="#carouselPeople" data-bs-slide-to="1"></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="py-0 bg-secondary">
        <div class="bg-holder opacity-25" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:top left;margin-top:-3.125rem;background-size:auto;">
        </div>
        <section class="py-0 bg-primary">
          <div class="container">
            <div class="row justify-content-md-between justify-content-evenly py-4">
              <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                <p class="fs--1 my-2 fw-bold text-200">All rights Reserved &copy; NF PETS, 2022</p>
              </div>
              <div class="col-12 col-sm-8 col-md-6">
                <p class="fs--1 my-2 text-center text-md-end text-200"> &nbsp;
                  <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                  </svg>&nbsp;by&nbsp;<a class="fw-bold text-info" href="https://themewagon.com/" target="_blank"> Nouhaila & Fatima-ezzahra </a>
                </p>
              </div>
            </div>
          </div>
        </section>
      </section>
    </main>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap" rel="stylesheet">
    @include('user.script')
 