@extends('layouts.app')
@section('pagetitle', 'Rollen')

@section('title')
	<i class="fa fa-map"></i> Rollen
	<div style="float:right">
		<a class="btn btn-success" href="{!! url('role/create') !!}">
			<i class="fa fa-bt fa-plus" aria-hidden="true"></i> Toevoegen
		</a>
	</div>
@endsection

@section('content')
	@if (count($roles) > 0)
		<table class="table table-striped table-hover">
			<thead>
				<th class="col-sm-4">Naam</th>
			</thead>
			<tbody>
				@foreach ($roles as $role)
				<tr class="row-link" style="cursor: pointer" data-href="{{action('RoleController@show', ['id' => $role->id])}}">
					<td class="table-text">{{ $role->name }}</td>
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
