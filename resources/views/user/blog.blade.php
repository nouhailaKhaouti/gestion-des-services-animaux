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
              <h1 class="fw-light font-base fs-6 fs-xxl-7"> 
                <strong> Blog <a href="{{ url('blog',$article->slug) }}">
                   {{ $article->title }}</a> 
                   details </strong></h1>
            </div>
          </div>
        </div>
      </section>

      <div class="right">
    <div class="bloc ">
<p class="fw-light font-base fs-1 fs-sm-1" >{{ $article->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$article->author_id)}}">{{ $article->author->username }}</a></p>
@if($article)
  <div class="fw-dark font-base fs-1 fs-sm-1">
    {!! $article->body !!}
  </div>    
  <div>
    <h2 class="fw-light font-base fs-1 fs-sm-1">Leave a comment</h2>
  </div>
    <div class="panel-body">
      <form method="post" action="/comment/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="on_article" value="{{ $article->id }}">
        <input type="hidden" name="slug" value="{{ $article->slug }}">
        <div style="margin-bottom:10px;" class="form-group">
          <textarea required="required" class="form-control" rows="1" name="body"></textarea>
        </div>
        <input type="submit" name='article_comment' class="btn btn-sm btn-rounded btn-info" value = "Post"/>
      </form>
    </div>
  <div>
    <ul style="list-style: none; padding: 0">
      @foreach($comments as $comment)
        <li class="panel-body">
          <div class="list-group">
            <div class="list-group-item">
              <h3>{{ $comment->author->username }}</h3>
              <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
            </div>
            <div class="list-group-item">
              <p>{{ $comment->body }}</p>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
  @endif
</div>
</div>
  @include('user.script')














