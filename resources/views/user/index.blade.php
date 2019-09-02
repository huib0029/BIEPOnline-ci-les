@extends('layouts.app')
@section('pagetitle', 'Gebruikers')

@section('title')
	<i class="fa fa-users"></i> Gebruikers
	<div style="float:right">
		<a class="btn btn-success" href="{!! url('user/create') !!}">
			<i class="fa fa-bt fa-plus" aria-hidden="true"></i> Toevoegen
		</a>
	</div>
@endsection

@section('content')
	@if (count($users) > 0)
		<table class="table table-striped table-hover">
			<thead>
				<th class="col-sm-3">Naam</th>
				<th class="col-sm-3">Email</th>
				<th class="col-sm-2">Rol</th>
				<th class="col-sm-2">Locatie</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr class="row-link" style="cursor: pointer" data-href="{{action('UserController@show', ['id' => $user->id])}}">
					<td class="table-text">{{ $user->name }}</td>
					<td class="table-text"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>

					<td class="table-text">
						@if (isset($user->role))
							{{ $user->role->name }}
						@endif
					</td>
					<td class="table-text">
						@if (isset($user->location))
							{{ $user->location->name }}
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection
@section('scripts')
<script>
	jQuery(document).ready(function($) {
	    $(".row-link").click(function() {
	        window.document.location = $(this).data("href");
	    });
	    $('#cohort-tabs a:first').tab('show') // Select first tab
	});
</script>

@endsection
