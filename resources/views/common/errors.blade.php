@if (count($errors) > 0)

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Sluit">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>Oeps, er is iets misgegaan!</strong>
	<br><br>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
