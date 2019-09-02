@extends('layouts.app')
@section('pagetitle', 'Rollen')

@section('title')
<div class="row">
	<div class="col-sm-8">
		{{$role->name}}
	</div>
	<div class="col-sm-1">
		 <a class="btn btn-primary" href="{{action('RoleController@edit', $role->id)}}"><i class="fa fa-bt fa-pencil" aria-hidden="true"></i> Bewerken</a>
	</div>
	<script>
			function confirmDelete() {
		var result = confirm('Weet u zeker dat u deze rol wilt verwijderen?');
		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
	</script>
	<div class="col-sm-1">
		{!! Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id], 'onsubmit' => 'return confirmDelete()']) !!}
		<button type="submit" name="button" class="btn btn-danger">
			<i class="fa fa-bt fa-trash" aria-hidden="true"></i> Verwijderen
		</button>
	</div>
</div>
@endsection

@section('content')
<div class="row">
</div>
@if (count($role->users) > 0)
	<table class="table table-striped table-hover">
		<thead>
		<th class="col-sm-3">Naam</th>
		<th class="col-sm-3">E-mail</th>
		</thead>
		<tbody>
		{{-- table which shows all users associated with the role --}}
		@foreach ($role->users as $user)
			<tr class="row-link" style="cursor: pointer;"
				data-href="{{action('UserController@show', ['id' => $user->id]) }}">
				<td class="table-text">{{ $user->name }}</td>
				<td class="table-text"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
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
