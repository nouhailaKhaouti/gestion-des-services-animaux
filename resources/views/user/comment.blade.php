<button type="button"  class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#exampleModal1" data-whatever="@getbootstrap"> <i class="fas fa-comment-alt"></i></button>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">New comment</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(session()->has('message3'))
        <div class="alert alert-success">
          <button type="button" class="close" data-bs-dismiss="alert">
            x
          </button>

          {{session()->get('message3')}}

        </div>
        @endif

        <h4>Display Comments</h4>

        <hr />
        @include('user.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

        <h4>Add comment</h4>
        <div class="panel-body">
          <form method="post" action="{{ route('comments.store') }}" class="panel-activity__status">
            @csrf
            <div class="form-group">
            <textarea name="description" placeholder="Share what you've been up to..." class="form-control"></textarea>
            <br>  
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-sm" value="Add Comment" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>