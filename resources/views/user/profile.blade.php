@include('user.head')
@include('user.navbar')
<section style="background-color:#ABC0CE">
  <div class="main-content" style="margin-top:25px; ">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-blue">Hello {{$profile->username}}</h1>
            <div class="col-4 text-right">
              @if(Auth::user()->id==$profile->id )
              @include('user.update_profile')
              @endif
              @if(Auth::user()->id != $profile->id && $profile->role =='sitter' && $sitter)
              @include('user.request')
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow" style="background-color:#F4EAEC">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="profileimage/{{$profile->image}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">

              <div class="text-center">
                <h3>
                  {{$profile->firstname}} {{$profile->lastname}} <br> <span class="font-weight-light">{{$profile->age}}</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$profile->work}} <br>
                  <i class="ni location_pin mr-2"></i>{{$profile->city}}, {{$profile->country}}
                </div>
                <hr class="my-4">
              </div>
              <br>
              <div class="h5 font-weight-300">
                @if($profile->role=='sitter')
                <label class="big">{{number_format($review, 1)}}</label>
                &nbsp;
                &nbsp;
                @for($i=1; $i<=$review; $i++) <span><i class="fa fa-star text-warning"></i></span>
                  @endfor
                  <label class="text-muted">{{$user_nembre}} reviews</label>
                  @endif
              </div>
              <div class="h5 font-weight-300">
                @if(Auth::user()->id != $profile->id && $profile->role=='sitter')
                @include('user.user-review-component')
                @endif
              </div>             
            @if(Auth::user()->id == $profile->id && Auth::user()->role!='sitter')
            <strong> Upgrade your account to become a sitter for NF PETS:</strong>
            <div class="card-body pt-0 pt-md-4">
        
              <form action="{{url('create_request')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="username" class="form-label">CIN:</label>
                <input type="text" name="cin" placeholder="tape here cin  ..." class="form-control" required>
                <label>upload your CIN file: </label>
                <input type="file" class="form-control" name="cin_file" value="cin_file" accept=".doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                <label>upload a proof of your previous experiences: </label>
                <input type="file" class="form-control" name="certificat" accept=".doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                <div style="padding: 15px;">
                  <button type="submit" class="btn btn-sm btn-outline-primary">submit</button>
                </div>
              </form>
            </div>
            @endif
            @if(Auth::user()->id==$profile->id && Auth::user()->role=='sitter' && $sitter->isEmpty())
            <div class="card-body pt-0 pt-md-4">
              <p>complet your account</p>
              @include('user.sitter')
            </div>
            @endif
            </div>

          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><strong> account</strong></h3>
                </div>
                @if(Auth::user()->id==$profile->id)
                <div class="col-4 text-right">
                  <a href="{{url('post_display')}}" class="btn btn-sm btn-info" style="color:azure">my posts</a>
                  @endif
                  @if(Auth::user()->id==$profile->id && Auth::user()->role=='sitter')
                  @include('admin.add_task')
                </div>
                @endif
              </div>
            </div>
            <div class="card-body" style="background-color:#F4EAEC">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <div class="form-control form-control-alternative">{{$profile->username}}</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <div class="form-control form-control-alternative">{{$profile->email}}</div>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <div class="form-control form-control-alternative">{{$profile->firstname}}</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <div class="form-control form-control-alternative">{{$profile->lastname}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <div class="form-control form-control-alternative">{{$profile->address}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <div class="form-control form-control-alternative">{{$profile->city}}</div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <div class="form-control form-control-alternative">{{$profile->country}}</div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <div class="form-control form-control-alternative">{{$profile->postal_code}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <div class="form-control form-control-alternative">{{$profile->about_you}}</div>
                  </div>
                </div>
                @if($profile->role == 'sitter' && Auth::user()->id==$profile->id )
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">task available </h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>task available </label>
                    @include('admin.task_table')
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">request received </h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>request received </label>
                    @include('user.demande_table')
                  </div>
                </div>
                @endif
                @if(Auth::user()->id==$profile->id && $profile->role == 'normale' )
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">request sended </h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>request sended </label>
                    @include('user.demande_normale_table')
                  </div>
                </div>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
        </div>
      </div>
    </div>
  </footer>
</section>