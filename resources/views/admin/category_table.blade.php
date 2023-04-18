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
                    <th>category name</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N°</th>
                    <th>category name</th>
                    <th>delete</th>
                    <th>edit</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($categorys as $category)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{$category->libelle}}</td>
                    <td><a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to delete this category ')" href="{{url('category_delete',$category->id)}}">delete</a></td>
                    <td>@include('admin.category_update')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>