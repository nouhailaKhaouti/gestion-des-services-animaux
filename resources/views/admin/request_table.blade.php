<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        sitter requests DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>CIN</th>
                    <th>N° warning</th>
                    <th>request status</th>
                    <th>check request demande</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>user Name</th>
                    <th>Email</th>
                    <th>CIN</th>
                    <th>N° warning</th>
                    <th>request status</th>
                    <th>check request demande</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($improves as $improve)
                <tr>
                    <td>{{$improve->user->username}}</td>
                    <td>{{$improve->user->email}}</td>
                    <td>{{$improve->cin}}</td>
                    <td>{{$improve->user->warning}}</td>
                    <td>
                        @if($improve->status=='in progress')
                        <a class="btn btn-sm  btn-outline-success"  href="{{url('approved_sitter',$improve->id)}}">Approve</a>
                        <a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to refuse this request ')" href="{{url('refused_sitter',$improve->id)}}">refuse</a>
                        @else
                        <strong>approved</strong>
                        @endif
                    </td>
                    <td><a class="btn btn-sm  btn-outline-info"  href="{{url('request_demande',$improve->id)}}">check request demande</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>