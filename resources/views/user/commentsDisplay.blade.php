@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <ul style="list-style: none; padding: 0">
        <li class="panel-body">
            <div class="list-group">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="margin-bottom:10px;" class="h-10 w-10 rounded-full object-cover" src="profileimage/{{$comment->user->image}}" href="">
                            <div class="ml-2">
                                <p> <strong>{{$comment->user->username}} </strong> <br> {{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                            </div>
                        </div>
                        @if($comment->user->id==Auth::user()->id)
                        <div class="ml-4">
                            <button align="right" style=" padding: 12px 16px;" type="button" class="btn btn-xs btn-transparent " data-bs-toggle="modal" data-bs-target="#updateModal" data-bs-whatever="@getbootstrap" href="{{url('update_Comment',$post->id)}}">
                                <i class="fas fa-pen"></i>
                            </button>
                            |
                            <a align="right" style=" padding: 12px 16px;" class="btn btn-xs btn-transparent" onclick="return confirm('are you sure ,you want to delete this')" href="{{url('delete_comment',$post->id)}}"><i class="fas fa-times"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="list-group-item" align="left">
                    <p>{{ $comment->description }} </p>
                </div>
                <br>
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Comments</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <form method="post" action="{{ url('update_comment',$comment->id) }}" class="panel-activity__status">
                                        @csrf
                                        <div class="form-group">
                                            <textarea name="description" placeholder="Share what you've been up to..." class="form-control"></textarea>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-sm" value="comment" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>

        @if($comment->parent_id==NULL)
        <div>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="description" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <br>
                    <input style=" padding: 12px 16px;" type="submit" class="btn btn-sm btn-info" value="Reply" />

                </div>
                <hr />
            </form>
        </div>

        @include('user.commentsDisplay', ['comments' => $comment->replies])
        @endif
    </ul>
</div>
@endforeach

@include('user.script')