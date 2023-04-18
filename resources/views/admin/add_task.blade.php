<button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleTModal">
    add
</button>
<div class="modal fade" id="exampleTModal" tabindex="-1" role="dialog" aria-labelledby="exampleTModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleTModalLabel">add task</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('task_create')}}" method="post">
                    @csrf
                    <input type="text" name="libelle" placeholder="tape here task name  ..." class="form-control" require="">
                    <br>
                    <input type="Number" name="prix" placeholder="chose a prix for this task  ..." class="form-control" require="">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" require>
                    <div style="padding: 15px;">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>