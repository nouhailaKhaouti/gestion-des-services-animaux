@include('user.head')
<!-- END nav -->
<section class="ftco-section">
  <div class="container" align="center">
    @if(session()->has('message'))
    <div class="alert alert-success">

      <button type="button" class="Close" data-bs-dismiss="alert">
        x
      </button>
      {{session()->get('message')}}
    </div>
    @endif
    <form action="{{url('editprofile',$profile->id)}}" class="panel-activity__status" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
        <label for="username" class="form-label">user name:</label>
        <input type="username" class="form-control" id="username" value="{{$profile->username}}" name="username">
      </div>
      <div class="mb-3 mt-3">
        <label for="firstname" class="form-label">first name:</label>
        <input type="text" class="form-control" id="firstname" value="{{$profile->firstname}}" name="firstname">
      </div>
      <div class="mb-3 mt-3">
        <label for="lastname" class="form-label">last name:</label>
        <input type="text" class="form-control" id="lastname" value="{{$profile->lastname}}" name="lastname">
      </div>
      <div class="mb-3 mt-3">
        <label for="phone" class="form-label">phone number:</label>
        <input type="number" class="form-control" id="phone" value="{{$profile->phone}}" name="phone">
      </div>
      <div class="mb-3 mt-3">
        <label for="address" class="form-label">address:</label>
        <input type="text" class="form-control" id="address" value="{{$profile->address}}" name="address">
      </div>
      <div class="mb-3">
        <label for="city" class="form-label">city:</label>
        <input type="text" class="form-control" id="city" value="{{$profile->city}}" name="city">
      </div>
      <div class="mb-3">
        <label for="country" class="form-label">country:</label>
        <input type="text" class="form-control" id="country" value="{{$profile->country}}" name="country">
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">age:</label>
        <input type="number" class="form-control" id="age" value="{{$profile->age}}" name="age">
      </div>
      <div class="mb-3">
        <label for="about_you" class="form-label">about you:</label>
        <input type="text" class="form-control" id="about_you" value="{{$profile->about_you}}" name="about_you">
      </div>
      <div class="actions">
        <div class="btn-group">
        <label>old image</label>
        <img src="profileimage/{{$profile->image}}" alt="">
        </div>
      </div>

      <div class="actions">
          <div class="btn-group">

        <label>change image</label>
        <input type="file" style="color:black" value="image" name="image">
          </div>
      </div>
                        <button type="submit" class="btn btn-sm btn-rounded btn-info">
                            Post
                        </button>
                    </div>
                </form>
</section>
@include('user.script')
