<div class="card-body">
    <table class="table">
  <thead>
    <tr>
                    <th scope="col">n°</th>
                    <th scope="col">sitter name</th>
                    <th scope="col">email</th>
                    <th scope="col">type of sitting</th>
                    <th scope="col">task wanted</th>
                    <th scope="col">days</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$request-->username}}</td>
                    <td>{{$request->user->email}}</td>
                    <td>{{$request->type}}</td>
                    <td>@foreach((array)$request->task as $task)
                  {{$task}},
                  @endforeach</td>
                    <td>@foreach((array)$request->jour as $jour)
                  {{$jour}},
                  @endforeach</td>
                   <td>
                        <strong>{{$request->status}}</strong>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>