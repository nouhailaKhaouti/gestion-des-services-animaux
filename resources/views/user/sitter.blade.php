<button style="  padding: 12px 16px;" type="button" class="btn  btn-xs btn-primary " data-bs-toggle="modal" data-bs-target="#exampleaModal" > 
complet
 </button>
<div class="modal fade" id="exampleaModal" tabindex="-1" role="dialog" aria-labelledby="exampleaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleaModalLabel">complet your account</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="{{url('create_sitter')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label><strong>Type of sitting :</strong></label><br>
                  @foreach($types as $type)
                  <label><input type="checkbox" name="type[]" value="{{$type->libelle}}"> {{$type->libelle}}</label>
                  @endforeach
                </div>
                <div class="form-group">
                  <label><strong>Category :</strong></label><br>
                  @foreach($categorys as $category)
                  <label><input type="checkbox" name="category[]" value="{{$category->libelle}}"> {{$category->libelle}}</label>
                  @endforeach
                </div>
                <div class="form-group">
                  <label><strong>Work days :</strong></label><br>
                  <label><input type="checkbox" name="jour[]" value="monday"> monday</label>
                  <label><input type="checkbox" name="jour[]" value="tuesday"> tuesday</label>
                  <label><input type="checkbox" name="jour[]" value="wednesday"> wednesday</label>
                  <label><input type="checkbox" name="jour[]" value="tuersday"> tuersday</label>
                  <label><input type="checkbox" name="jour[]" value="friday"> friday</label>
                  <label><input type="checkbox" name="jour[]" value="saturday"> saturday</label>
                  <label><input type="checkbox" name="jour[]" value="sunday"> sunday</label>
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                <div style="padding: 15px;">
                  <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>
                </div>
</form>
</div>
    </div>
  </div>
</div>
@include('user.script')