<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="blue">
		
		<a href="index.html" class="logo">
			{{-- <img src="{{asset('images/logodkm.png')}}" width="40px"  height="40px" alt="navbar brand" class="navbar-brand"> --}}
			<h3 style="color: white; margin-top: 15%; margin-left: 30%;"><b>MASTERKAS</b></h3>
		{{-- 	<p style="color: white">Dkm Masjid</p> --}}
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	@include('_menu.navbar')
	<!-- End Navbar -->
</div>