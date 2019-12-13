<div class="row">
	<div class="sidebar sidebar-style-2">
		<div class="sidebar-wrapper scrollbar scrollbar-inner">
			<div class="sidebar-content">
				<div class="user">
					<div class="avatar-sm float-left mr-2">
						<img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
					</div>
					<div class="info">
						<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								Welcome
								<span class="user-level">{{ Auth::user()->name  }}</span>
								<span class="caret"></span>
							</span>
						</a>
						<div class="clearfix"></div>
						<div class="collapse in" id="collapseExample">
							<ul class="nav">
								<li>
									<a href="#profile">
										<span class="link-collapse">My Profile</span>
									</a>
								</li>
								<li>
									<a href="#edit">
										<span class="link-collapse">Edit Profile</span>
									</a>
								</li>
								<li>
									<a href="#settings">
										<span class="link-collapse">Settings</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<ul class="nav nav-warning">
					<li class="nav-item">
						<a href="{{ route('dashboard.index') }}" class="collapsed" aria-expanded="false">
							<i class="fas fa-home"></i>
							<p>Dashboard</p>
							{{-- 	<span class="caret"></span> --}}
						</a>
					</li>
					{{-- 	<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
					</li> --}}
					<li class="nav-item">
						<a href="{{ route('kasmasuk.index') }}">
							<i class="fas fa-file-signature"></i>
							<p>Kas Masuk</p>
						</a>
					</li>
					<li class="nav-item">
						<a  href="{{ route('kaskeluar.index') }}">
							<i class="fas fa-file-signature"></i>
							<p>Kas Keluar</p>
						</a>
					</li>
					<li class="nav-item">
						<a  href="{{ route('rekapitulasi.index') }}">
							<i class="fas fa-file-signature"></i>
							<p>Rekapitulasi</p>
						</a>
					</li>
					@if(Auth::user()->role == "admin")
					<li class="nav-item">
						<a  href="{{ route('user.index') }}">
							<i class="fas fa-users"></i>
							<p>Manajemen User</p>
						</a>
					</li>
					@endif
					<li class="nav-item">
						<a data-toggle="collapse" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fas fa-sign-out-alt"></i>
							<p>Logout</p>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>