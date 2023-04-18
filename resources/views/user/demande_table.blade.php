    <div class="card-body">
    <table class="table">
  <thead>
    <tr>
                    <th scope="col">n°</th>
                    <th scope="col">user name</th>
                    <th scope="col">email</th>
                    <th scope="col">pet category</th>
                    <th scope="col">breed</th>
                    <th scope="col">type of sitting</th>
                    <th scope="col">task wanted</th>
                    <th scope="col">days</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandes as $demande)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$demande->user->username}}</td>
                    <td>{{$demande->user->email}}</td>
                    <td>{{$demande->category}}</td>
                    <td>{{$demande->breed}}</td>
                    <td>{{$demande->type}}</td>
                    <td>@foreach((array)$demande->task as $task)
                  {{$task}},
                  @endforeach</td>
                    <td>@foreach((array)$demande->jour as $jour)
                  {{$jour}},
                  @endforeach</td>
                   <td> @if($demande->status=='in progress')
                        <a class="btn btn-sm  btn-outline-success"  href="{{url('approved_demande',$demande->id)}}">Accept</a>
                        <a class="btn btn-sm  btn-outline-danger" onclick="return confirm('are you sure ,you want to refuse this request ')" href="{{url('refused_demande',$demande->id)}}">refuse</a>
                        @elseif($demande->status=='Accept')
                        <strong>Accepted</strong>
                        @else
                        <strong>Refused</strong>
                    @endif
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>