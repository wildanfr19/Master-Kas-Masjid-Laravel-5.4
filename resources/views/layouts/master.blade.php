<!DOCTYPE html>
<html lang="en">
@include('_menu.header')
<body>
	<div class="wrapper">
		@include('_menu.main-header')
		@include('_menu.sidebar')
		<div class="main-panel">
			{{-- @include('_menu.content') --}}
			@yield('content')

			@include('_menu.footer')
		</div>
		{{-- @include('_menu.custome') --}}
	</div>
	@include('_menu.script')
</body>
</html>