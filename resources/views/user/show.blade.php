@extends('layouts.app')
@section('pagetitle', 'Gebruikers')

@section('title')
<div class="row">
	<div class="col-sm-8">
		{{$user->name}}
	</div>
	<div class="col-sm-1">
		 <a class="btn btn-primary" href="{{action('UserController@edit', $user->id)}}"><i class="fa fa-bt fa-pencil" aria-hidden="true"></i> Bewerken</a>
	</div>

@section('script')
	<script>
			function confirmDelete() {
		var result = confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?');
		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
	</script>
	@endsection('script')

	<div class="col-sm-2">
		{!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'onsubmit' => 'return confirmDelete()']) !!}
		<button type="submit" name="button" class="btn btn-danger">
			<i class="fa fa-bt fa-trash" aria-hidden="true"></i> Verwijderen
		</button>
	</div>
</div>
@endsection

@section('content')
<div title="Klik hier om de profielafbeelding te wijzigen."><a href="{!! url('avatar') !!}"><img id="avatar" src="/uploads/avatars/{{ Auth::user()->avatar }}"></a></div>
<br><br>
<table class="table">
	<tbody>
		<tr>
			<td><b>Naam</b></td>
			<td>{{ Auth::user()->name }}</td>
		</tr>
		<tr>
			<td><b>Email</b></td>
			<td>{{ Auth::user()->email }}</td>
		</tr>
		<tr>
			<td><b>Rol</b></td>
			<td>
				@if (isset($user->role))
					{{ $user->role->name }}
				@endif
			</td>
		</tr>
		<tr>
			<td><b>Locatie</b></td>
			<td>
				@if (isset($user->location))
					{{ $user->location->name }}
				@endif
			</td>
		</tr>
	</tbody>
</table>
<p>Klik op <a href="{{action('UserController@edit', $user->id)}}">Bewerken</a> om de gegevens te wijzigen.</p>
@endsection
