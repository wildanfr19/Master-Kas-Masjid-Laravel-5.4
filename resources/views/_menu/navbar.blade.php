<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
	
	<div class="container-fluid">
		<div class="collapse" id="search-nav">
		</div>
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
				<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
					<i class="fa fa-search"></i>
				</a>
			</li>
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="{{asset('assets/img/profile.jpg')}}"alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="{{asset('assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4>{{ Auth::user()->name }}</h4>
									<p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">My Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}" 
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">

							Logout
						    </a>
						    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						        {{ csrf_field() }}
						    </form>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>