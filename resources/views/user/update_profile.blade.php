@include('user.head')
<button   style="float:left;" type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit profile
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('editprofile',$profile->id)}}" class="panel-activity__status" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 mt-3" style="text-align:left;">
            <label  for="username" class="form-label">user name:</label>
            <input type="text" class="form-control" id="username" value="{{$profile->username}}" name="username">
          </div>
          <div class="mb-3 mt-3" style="text-align:left;">
            <label for="firstname" class="form-label">first name:</label>
            <input type="text" class="form-control" id="firstname" value="{{$profile->firstname}}" name="firstname">
          </div>
          <div class="mb-3 mt-3" style="text-align:left;">
            <label for="lastname" class="form-label">last name:</label>
            <input type="text" class="form-control" id="lastname" value="{{$profile->lastname}}" name="lastname">
          </div>

            <input type="hidden" class="form-control" id="email" value="{{$profile->email}}" name="email">
          <div class="mb-3 mt-3" style="text-align:left;">
            <label for="phone" class="form-label">phone number:</label>
            <input type="number" class="form-control" id="phone" value="{{$profile->phone}}" name="phone">
          </div>
          <div class="mb-3 mt-3" style="text-align:left;">
            <label for="address" class="form-label">address:</label>
            <input type="text" class="form-control" id="address" value="{{$profile->address}}" name="address">
          </div>
          <div class="mb-3" style="text-align:left;">
            <label for="city" class="form-label">city:</label>
            <input type="text" class="form-control" id="city" value="{{$profile->city}}" name="city">
          </div>
          <div class="mb-3" style="text-align:left;">
            <label for="postal_code" class="form-label">postal code:</label>
            <input type="text" class="form-control" id="postal_code" value="{{$profile->postal_code}}" name="postal_code">
          </div>
          <div class="mb-3" style="text-align:left;">
            <label for="country" class="form-label">country:</label>
            <input type="text" class="form-control" id="country" value="{{$profile->country}}" name="country">
          </div>
          <div class="mb-3" style="text-align:left;">
            <label for="age" class="form-label">age:</label>
            <input type="number" class="form-control" id="age" value="{{$profile->age}}" name="age">
          </div>
          <div class="mb-3" style="text-align:left;">
            <label for="about_you" class="form-label">about you:</label>
            <input type="text" class="form-control" id="about_you" value="{{$profile->about_you}}" name="about_you">
          </div>
          
          <div class="actions" style="text-align:left;">
            <div class="btn-group" >
              <label>change image</label>
              <input type="file" style="color:black" value="profileimage/{{$profile->image}}" name="image">
            </div>
          </div>
          <button type="submit" class="btn btn-sm btn-rounded btn-info">
            update
          </button>
      </form>
      </div>   
    </div>
  </div>
</div>
@include('user.script')