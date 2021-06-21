<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>CDCOL - @yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		@section('header')
			<h1>@yield('title')</h1>
		@show

		<div class="content">
			@yield('content')
		</div>

		@section('footer')
			<em><small>&copy; 2021</small></em>
		@show
	</div>
</body>
</html>