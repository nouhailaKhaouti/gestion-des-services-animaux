<form action="{{url('sendmail')}}" method="post"  >
                    @csrf
                        <input type="hidden" name="subject" value="hello {{$post->user->username}} " >
                        <input type="hidden" name="message" value="the user {{Auth::user()->username}} is interested in you post {{$post->titre}} you can contact {{Auth::user()->username}} for more information">
                        <input type="hidden" name="email" value="{{$post->user->email}}">
                    <div style="padding: 15px;">
                       
                    <button style="padding: 12px 16px;" type="submit" class="btn btn-primary btn-sm  btn-outline-info">
                    @if($post->tag=='adopt' )
                    Interested 
                    @else                     
                    Found
                    @endif
                    <i class="fas fa-envelope-open-text"></i></button>
                    </div>
</form>