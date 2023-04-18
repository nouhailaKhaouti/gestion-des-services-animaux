@include('user.navbar')
@include('user.head')
    <main class="main" id="top">
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-bg.png);background-position:top center;background-size:cover;">
        </div>
        <div class="container">
          <div class="row min-vh-xl-100 min-vh-xxl-25">
            <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/blog.jpg" alt="hero-header" width="600" height="600" style=" border-radius: 8px; " /></div>
            <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
              <h1 class="fw-light font-base fs-6 fs-xxl-7"><strong> Training blogs </strong></h1>
            </div>
          </div>
        </div>
      </section>
      @foreach($articles as $article) 
      <div class="right">
    <div class="bloc" style="margin-bottom:10px;">
      <h3><a href="{{ url('blog',$article->slug) }}">{{ $article->title }}</a>
      </h3>
      <p>{{ $article->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$article->author_id)}}">{{ $article->author->username }}</a></p>
      <article>
        {!! Str::limit($article->body, $limit = 1500, $end = '....... <a href='.url("/".$article->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div>
  @endforeach
  @include('user.script')





