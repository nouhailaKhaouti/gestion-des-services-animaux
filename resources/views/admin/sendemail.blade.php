<button type="button" class="btn btn-sm  btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
    send email
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">send an email to {{$user->username}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('sendmail')}}" method="post">
                    @csrf
                    <input type="hidden" name="subject" value="hello {{$user->username}} ">
                    <textarea name="message" placeholder="tape here what you want to say..." class="form-control"></textarea>
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <div style="padding: 15px;">

                        <button type="submit" class="btn btn-sm  btn-outline-primary">submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>