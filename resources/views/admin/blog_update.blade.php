@include('admin.head')

<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main algin="center">
                <br>
                <br>
                <br>
                <br>
                <div class="container-fluid px-4">
                    <h3><strong>Update your Blog</strong></h3>
                    <br>
                    <br>
                <div class="col-xl-9 order-xl-3" algin="center">

                    <div class="card bg-secondary shadow">

                        <div class="card-header bg-white border-0">
                            <br>
                            <br>

                            <div class="card-body">
                                <script type="text/javascript" src="{{ asset('/blog/js/tinymce/tinymce.min.js') }}"></script>
                                <script type="text/javascript">
                                    tinymce.init({
                                        selector: "textarea",
                                        plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
                                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                                    });
                                </script>
                                <form method="post" action='{{ url("/update") }}'>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="article_id" value="{{ $article->id }}{{ old('article_id') }}">
                                    <div class="form-group">
                                        <input required="required" placeholder="Enter title here" type="text" name="title" class="form-control" value="@if(!old('title')){{$article->title}}@endif{{ old('title') }}" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name='body' class="form-control">
                                         @if(!old('body'))
                                         {!! $article->body !!}
                                         @endif
                                         {!! old('body') !!}
                                         </textarea>
                                    </div>
                                    @if($article->active=='1')
                                    <input type="submit" name='publish' class="btn btn-sm  btn-outline-primary" value="Update" />
                                    @else
                                    <input type="submit" name='publish' class="btn btn-sm  btn-outline-success" value="Publish" />
                                    @endif
                                    <input type="submit" name='save' class="btn btn-sm  btn-outline-info" value="Save As Draft" />
                                    <a href="{{  url('delete/'.$article->id.'?_token='.csrf_token()) }}" class="btn btn-sm  btn-outline-danger">Delete</a>
                                </form>
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