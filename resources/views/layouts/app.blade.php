<!DOCTYPE html>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="{{ asset('favicon.png') }}">
		<title>@yield('pagetitle') | {{ config('app.name') }}</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#responsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand logo" href="{{ url('home') }}"><img id="header-logo" src="{{ asset('img/Logo.png') }}"></a>
			<div class="collapse navbar-collapse" id="responsive">
				@if (Auth::check())
				<ul class="navbar-nav mr-auto">
					<!-- <form class="form-inline mt-2 mt-md-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Boek, ISBN of Auteur...">
						<button class="btn btn-secondary my-2 my-sm-0" type="submit">Zoeken</button>
					</form> -->
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Administratie
						</a>
						@include('common.adminmenu')
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img id="thumbnail" src="/uploads/avatars/{{ Auth::user()->avatar }}"> {{ Auth::user()->name }}
						</a>
						@include('common.usermenu')
					</li>
				</ul>
				@else
				<ul class="navbar-nav mr-auto"></ul>
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('login') }}">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('register') }}">Registreer</a>
					</li>
				</ul>
				@endif
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				@if (Auth::check())
					<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
						<ul class="nav nav-pills flex-column">
								@include('common.leftmenu')
						</ul>
					</nav>
				@else
				@endif
				<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
					<h1>@yield('title')</h1>
					@include('common.errors')
					@include('common.failure')
					@include('common.success')
					@yield('content')
				</main>
			</div>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('scripts')
	</body>
</html>
