<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        animal Category DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>type name</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>type name</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <td></td>
                    <td>{{$type->libelle}}</td>
                    <td><a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to delete this type ')" href="{{url('type_delete',$type->id)}}">delete</a></td>
                    <td>@include('admin.type_update')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>