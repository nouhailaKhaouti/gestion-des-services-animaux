<button style="  padding: 12px 16px;" type="button" class="btn  btn-xs btn-primary " data-bs-toggle="modal" data-bs-target="#exampleRModal">
    Review
</button>
<div class="modal fade" id="exampleRModal" tabindex="-1" role="dialog" aria-labelledby="exampleRModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleRModalLabel">update your post</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="sitter_id" value="{{$profile->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="row justify-content-end mb-1">
                        <div class="col-sm-8 float-right">
                            @if(Session::has('flash_msg_success'))
                            <div class="alert alert-success alert-dismissible p-2">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> {!! session('flash_msg_success')!!}.
                            </div>
                            @endif
                        </div>
                    </div>
                    <p class="font-weight-bold ">Review</p>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 ">
                        <button class="btn btn-sm py-2 px-3 btn-info">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('user.script')