<form action="{{url('warning',$post->user->id)}}" method="post"  >
                    @csrf
                        <input type="hidden" name="subject" value="hello {{$post->user->username}} " >
                        <input type="hidden" name="message" value="you've been warned for this post {{$post->titre}} for breaking the NF pets roles , you need to be carefull next time to not cause you to be baned from our website.">
                        <input type="hidden" name="email" value="{{$post->user->email}}">
                    <div style="padding: 15px;">
                       
                    <button style="padding: 12px 16px;" type="submit" class="dropdown-item">
                      signal
                    </button>
                    </div>
</form>