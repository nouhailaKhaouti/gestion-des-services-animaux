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
                    <th>breed name</th>
                    <th>category</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>breed name</th>
                    <th>category</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($breeds as $breed)
                <tr>
                    <td></td>
                    <td>{{$breed->libelle}}</td>
                    <td>{{$breed->category}}</td>
                    <td><a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to delete this breed ')" href="{{url('breed_delete',$breed->id)}}">delete</a></td>
                    <td>@include('admin.breed_update')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>