@if(Session::get('success'))

<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Sluit">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ Session::get('success') }}</strong>
</div>
@endif
