@include('user.navbar')
@include('user.head')
@include('user.create_normale_post')
@include('user.create_post')
<section class="ftco-section">
    <div class="container" align="center">
        @if(session()->has('message2'))
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
            {{session()->get('message2')}}
        </div>
        @endif
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow card-span rounded-3">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img style="margin-bottom:10px;" class="h-10 w-10 rounded-full object-cover" src="profileimage/{{$post->user->image}}" href="">
                                    <div class="ml-2">
                                        <p> <strong>{{$post->user->username}} </strong> <br> {{$post->created_at}}</p>
                                    </div>
                                </div>
                                <div class="ml-4">
                                            @include('user.update_post')
                                            |
                                            <a style="padding: 12px 16px;" class="btn btn-transparent btn-sm" onclick="return confirm('are you sure ,you want to delete this')" href="{{url('delete_post',$post->id)}}"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5> {{$post->tag}}
                            </h5>
                            <h4 class="mb-3 tx-14"> {{$post->status}}</h4>
                            <p class="mb-3 tx-14"> {{$post->description}}</p>
                            @include('user.imagesDisplay', ['images' => $post->images, 'post_id' => $post->id])
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                                <small class="float-right">
                                    <a style="color:#294F7B;  font-size: 15px;" class="button" href="/post/{{ $post -> id }}/like/">
                                        <ion-icon name="md-heart">Like</ion-icon>
                                    </a>
                                    <span class="comment-count btn btn-info btn-sm ">{{$post->likes}}</span>
                                    <a style="color:#294F7B;  font-size: 15px;" class="button" href="/post/{{ $post -> id }}/dislike/">
                                        <ion-icon name="md-heart">Unlike</ion-icon>
                                    </a>
                                </small>
                                &nbsp;
                                @include('user.comment')
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category"]').on('change', function() {
            var categoryID = $(this).val();
            if (categoryID) {
                $.ajax({
                    url: '/myform/ajax/' + categoryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $('select[name="breed"]').empty();
                        $.each(data, function(breed_id, libelle) {
                            $('select[name="breed"]').append('<option value="' + breed_id + '">' + libelle + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="breed"]').empty();
            }
        });
    });
</script>
@include('user.script')