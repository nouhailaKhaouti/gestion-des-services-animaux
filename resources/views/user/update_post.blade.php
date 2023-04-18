
<button style="  padding: 12px 16px;" type="button" class="btn  btn-xs btn-transparent " data-bs-toggle="modal" data-bs-target="#exampleModal" > 
<i class="fas fa-pen"></i>
 </button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update your post</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('update_post',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">update post:</label>
            <textarea  value="{{$post->description}}" name="description" class="form-control" id="message-text">{{$post->description}}</textarea>
            <input type="titre" class="form-control" id="titre" value="{{$post->titre}}" name="titre">
            <input type="tag" class="form-control" id="tag" value="{{$post->tag}}" name="tag">
            <select name="status" style="color: black; width: 200px" required="">
                            <option>{{$post->status}}</option>
                            <option value="available">available</option>
                            <option value="not_available">not available</option>
            </select>
            <input type="file" style="color:black" value="postvideo/{{$post->video}}" name="video">
            <input type="file" style="color:black" value="imag[]" name="image[]" multiple >
          </div>      
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">update</button>
      </div>
        </form>
        </div>
    </div>
  </div>
</div>
@include('user.script')