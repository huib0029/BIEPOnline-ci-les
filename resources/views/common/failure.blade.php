@if(Session::get('failure'))

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Sluit">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ Session::get('failure') }}</strong>
</div>
@endif
