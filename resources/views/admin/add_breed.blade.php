<button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    add
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add breed</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('breed_create')}}" method="post">
                    @csrf
                    <input type="text" name="libelle" placeholder="tape here breed name  ..." class="form-control" require>
                    <br>
                    <select name="category" id="departement" class="custom-select" require>
                        <option value="">---select category---</option>
                        @foreach($categorys as $category)
                        <option value="{{$category->libelle}}">{{$category->libelle}}</option>
                        @endforeach
                    </select>
                    <div style="padding: 15px;">
                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>