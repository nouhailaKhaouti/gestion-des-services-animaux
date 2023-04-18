@include('admin.head')

<body class="sb-nav-fixed">
    @include('admin.nav')
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            @include('admin.nav_side')
            <main>
                <div class="container-fluid px-4">
                <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        User DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>role</th>
                    <th>N° warning</th>
                    <th>acces denied</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>role</th>
                    <th>N° warning</th>
                    <th>acces denied</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->warning}}</td>
                    <td>
                    @if($user->acces=='approved')
                    <a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to band this user ')" href="{{url('acces_denied',$user->id)}}">denied</a>
                    @else
                    <a class="btn btn-sm  btn-outline-primary" href="{{url('acces_approved',$user->id)}}">approved</a>
                    @endif
                    @include('admin.warning_email') 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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