@include('admin.head')

<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main>
            <div class="container-fluid px-4">
            <div class="row">

                <div class="col-xl-3 col-md-6">
                <br>
                <br>
                <br>
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">sitter request</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('request')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </main>
            <main>
                <div class="container-fluid px-4">
                    <br>
                    @include('admin.sitter_table')
                </div>
            </main>
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>

</html>