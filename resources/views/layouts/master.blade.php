<!DOCTYPE html>
<html lang="en">
@include('layouts.frontcss')
<body class="home-page home-01 ">
	@include('layouts.minhead')
	<!--header nav-->
	@include('layouts.header')
	{{-- @yield('content') --}}
    {{ $slot }}
    {{-- footer  --}}
    @include('layouts.footer')
	@include('layouts.frontjs')
</body>
</html>
