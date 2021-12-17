<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.elements.head')
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">

	<div class="wrapper">

{{--		 <div id="loader"></div>--}}

		@include('admin.elements.header')

		@include('admin.elements.sidebar')

		<div class="content-wrapper">
			<div class="container-full">
				@yield('main-content')
			</div>
		</div>


		@include('admin.elements.footer')

	</div>

	@include('admin.elements.script')

</body>

</html>
