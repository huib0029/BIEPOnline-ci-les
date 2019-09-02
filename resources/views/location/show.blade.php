@extends('layouts.app')
@section('pagetitle', 'Locaties')

@section('title')
<div class="row">
	<div class="col-sm-8">
		{{$location->name}}
	</div>
	<div class="col-sm-1">
		 <a class="btn btn-primary" href="{{action('LocationController@edit', $location->id)}}"><i class="fa fa-bt fa-pencil" aria-hidden="true"></i> Bewerken</a>
	</div>
	<script>
			function confirmDelete() {
		var result = confirm('Weet u zeker dat u deze locatie wilt verwijderen?');
		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
	</script>
	<div class="col-sm-1">
		{!! Form::open(['method' => 'DELETE', 'route' => ['location.destroy', $location->id], 'onsubmit' => 'return confirmDelete()']) !!}
		<button type="submit" name="button" class="btn btn-danger">
			<i class="fa fa-bt fa-trash" aria-hidden="true"></i> Verwijderen
		</button>
	</div>
</div>
@endsection

@section('content')
<table class="table table-striped table-hover">
	<thead>
		<th class="col-sm-4">Naam</th>
	</thead>
	<tbody>
		<tr class="row-link" style="cursor: pointer;"
			data-href="{{action('LocationController@show', ['id' => $location->id]) }}">
			<td class="table-text">{{ $location->name }}</td>
		</tr>
	</tbody>
</table>
@endsection
