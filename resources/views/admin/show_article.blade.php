@include('admin.head')

<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main>
                <div class="container-fluid px-4">
                    <br>
                    <br>
                    {{ $article->title }}
                    <button class="btn" style="float: right"><a href="{{ url('edit/'.$article->slug)}}">Edit article</a></button>
                   <section>
                    <p>{{ $article->created_at->format('M d,Y \a\t h:i a') }} By {{ $article->author->username }}</p>
                    </section>
                    <div>
                        {!! $article->body !!}
                    </div>
                    <div>
                        <h2>Leave a comment</h2>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/comment/add">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="on_article" value="{{ $article->id }}">
                            <input type="hidden" name="slug" value="{{ $article->slug }}">
                            <div class="form-group">
                                <textarea required="required" placeholder="Enter comment here" name="body" class="form-control"></textarea>
                            </div>
                            <input type="submit" name='p_comment' class="btn btn-success" value="article" />
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
                </div>
            </main>
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>

</html>