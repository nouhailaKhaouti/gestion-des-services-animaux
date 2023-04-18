<button type="button" class="btn btn-sm  btn-outline-info" data-bs-toggle="modal" data-bs-target="#example{{ $loop->iteration }}Modal">
   update task
</button>
<div class="modal fade" id="example{{ $loop->iteration }}Modal" tabindex="-1" role="dialog" aria-labelledby="example{{ $loop->iteration }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example{{ $loop->iteration }}ModalLabel">update {{$task->libelle}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('task_update',$task->id)}}" method="post">
                    @csrf
                    <input type="text" name="libelle" value="{{$task->libelle}}" class="form-control">
                    <br>
                    <input type="Number" name="prix" value="{{$task->prix}}" class="form-control">
                    <div style="padding: 15px;">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>