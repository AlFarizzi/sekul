@include('partials.header')
	<div class="wrapper">

        @include('components.Navbar')
        @include('components.Sidebar')
		<div class="main-panel">
			<div class="content">
                @include('sweetalert::alert')
                @yield('content')
			</div>
			@include('components.Footer')
		</div>
    </div>
@include('partials.footer')
