<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        sitters DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Sitter Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>N° warning</th>
                    <th>Change role</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Sitter Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>N° warning</th>
                    <th>Change role</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->warning}}</td>
                    <td>
                        <a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to change the role of this user ')" href="{{url('change_role',$user->id)}}">normal</a>
                    </td>
                    <td> @include('admin.warning_email')
                    </td>
                    <td>
                        @include('admin.sendemail')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
