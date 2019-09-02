<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
	<a class="dropdown-item" href="{{ url('/user/' . Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Gebruikersprofiel</a>
	<a class="dropdown-item" href="{{ url('/help') }}"><i class="fa fa-question fa-fw"></i> Ondersteuning</a>
	<a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Log uit</a>
</div>
