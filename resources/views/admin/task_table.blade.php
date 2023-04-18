
    <div class="card-body">
    <table class="table">
  <thead>
    <tr>
                    <th scope="col">n°</th>
                    <th scope="col">task</th>
                    <th scope="col">prix</th>
                    @if(Auth::user()->id == $profile->id)
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$task->libelle}}</td>
                    <td>{{$task->prix}}</td>
                    @if(Auth::user()->id == $profile->id)
                    <td><a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to delete this task ')" href="{{url('task_delete',$task->id)}}">delete</a></td>
                    <td>@include('admin.task_update')</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>