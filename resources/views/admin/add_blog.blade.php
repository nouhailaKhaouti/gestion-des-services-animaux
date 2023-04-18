@include('admin.head')
<script type="text/javascript" src="{{ asset('/blog/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
selector: "textarea",
plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main  style="margin-left: 140px;">
                <br>
                <br>
                <br>
                <br>
                <div class="container-fluid px-4" >
                    <h3 style="color:cornflowerblue"><strong>Create your Blog</strong></h3>
                    <br>
                    <br>
                <div class="col-xl-9 order-xl-3" >

                    <div class="card bg-secondary shadow">

                        <div class="card-header bg-white border-0">
                            <br>
                            <br>

                            <div class="card-body">
                                <form action="/new-post" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name="title" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name='body' class="form-control">{{ old('body') }}</textarea>
                                    </div>
                                    <br>
                                    <input type="submit" name='publish'  class="btn btn-md  btn-outline-success" value="Publish" />
                                    <input type="submit" name='save'  class="btn btn-md  btn-outline-info" value="Save Draft" />
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

