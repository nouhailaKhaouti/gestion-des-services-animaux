<button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal" data-bs-target="#example{{$profile->id}}Modal">
    request
</button>
<div class="modal fade" id="example{{$profile->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="example{{$profile->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example{{$profile->id}}ModalLabel">send a request</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-bs-dismiss="alert">
                        x
                    </button>

                    {{session()->get('message')}}

                </div>
                @endif
                <form action="{{url('demande')}}" method="post">
                    @csrf
                    <label>type: </label>
                    <select name="type" class="form-control" require>
                        <option value="">---select type---</option>
                        @foreach((array)$sitter->type as $type)
                        <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                    <label for="username" class="form-label">category:</label>
                    <select name="category"  class="form-control" require>
                        <option value="">---select category---</option>
                        @foreach((array)$sitter->category as $category)
                        <option value="{{$category}}">{{$category}}</option>
                        @endforeach
                    </select>
                    <label>breed: </label>
                    <select class="form-control" name="breed" id="breed" require>
                    <option value="">---select breed---</option>
                        @foreach( $breeds as $breed)
                        <option value="{{$breed->libelle}}">{{$breed->libelle}}</option>
                        @endforeach
                    </select>
                    </select>
                   
                    <div class="form-group">
                  <label><strong> days:</strong></label><br>
                  @foreach((array)$sitter->jour as $jour)
                  <label><input type="checkbox" name="jour[]" value="{{$jour}}">{{$jour}}</label>
                  @endforeach
                    </div>
                    <div class="form-group">
                  <label><strong> task wanted:</strong></label><br>
                  @foreach($tasks as $task)
                  <label><input type="checkbox" name="task[]" value="{{$task->libelle}}">{{$task->libelle}}/{{$task->prix}}$</label>
                  @endforeach
                    </div>
                    </select>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="sitter_id" value="{{$profile->id}}">
                    <div style="padding: 15px;">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('user.script')