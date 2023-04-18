@include('admin.head')
<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main  style="margin-left: 20px;">
                <br>
                <br>
                <br>
                <br>
                <div class="container-fluid px-4" algin="center">
                    <h3><strong>Add blog</strong></h3>
                    <br>
                    <br>

                    <button type="button" class="btn btn-sm  btn-outline-primary" ><a href="{{ url('new-post')}}">Article</a></button>
                    <br>
                    <br>
                    <div class="col-xl-9 order-xl-3" algin="center">

                        <div class="card bg-secondary shadow">

                            <div class="card-header bg-white border-0" style="float: center">
                                <br>
                                <br>

                                <div class="card-body">
                                    @if ( !$articles->count() )
                                    There is no article till now. Login and write a new post now!!!
                                    @else
                                    <div class="">
                                        @foreach( $articles as $post )
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
                                                    @if($post->active == '1')
                                                    <button class="btn btn-sm  btn-outline-primary"  style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Article</a></button>
                                                    @else
                                                    <button class="btn btn-sm  btn-outline-info"  style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                                                    @endif
                                                </h3>
                                                <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By {{ $post->author->username }}</p>
                                            </div>
                                            <div class="list-group-item">
                                                <article>
                                                    {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/index".$post->slug).'>Read More</a>') !!}
                                                </article>
                                            </div>
                                        </div>
                                        <br>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>
</html>