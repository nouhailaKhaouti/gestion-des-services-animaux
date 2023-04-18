<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/gallery/test.png" width="118" alt="logo" /><h2 style="margin-left:15px;">NF PETS</h2></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{url('home')}}"><strong>Home</strong></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('show_sitter')}}"><strong>Sitters</strong></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('donation')}}"><strong>Donation</strong></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('missing')}}"><strong>Missing</strong> </a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('adopt')}}"><strong>Adoption</strong></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('share_post')}}"><strong>Share</strong></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="{{url('show_blog')}}"><strong>Blogs</strong></a></li>
              @if(Route::has('login'))
				@auth
				&nbsp;
				&nbsp;
				<x-app-layout>
				</x-app-layout>
				@else
				<li class="nav-item">
					<a class="btn btn-primary sm-2" href="{{route('login')}}">Login </a>
				</li>
        &nbsp;
				<li class="nav-item">
					<a class="btn btn-primary sm-2" href="{{route('register')}}">Register</a>
					@endauth
					@endif
            </ul>
      
          </div>
        </div>
      </nav>