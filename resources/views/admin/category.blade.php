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
                   <h3><strong>Add Category</strong></h3>
                   <br>
                   @include('admin.add_category')
                   <br>
                   <br>
                   <br>
                    @include('admin.category_table')
                </div>
            </main>
            @include('admin.footer')
        </div>
    </div>
    @include('admin.script')
</body>

</html>