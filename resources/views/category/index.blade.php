@extends('layouts.app')
@section('pagetitle', 'Categorieën')

@section('title')
	<i class="fa fa-university"></i> Categorieën
	<div style="float:right">
		<a class="btn btn-success" href="{!! url('category/create') !!}">
			<i class="fa fa-bt fa-plus" aria-hidden="true"></i> Toevoegen
		</a>
	</div>
@endsection

@section('content')
	@if (count($categories) > 0)
		<table class="table table-striped table-hover">
			<thead>
				<th class="col-sm-3">Naam</th>
				<th class="col-sm-3">Kleur</th>
			</thead>
			<tbody>
				@foreach ($categories as $row)
				<tr class="row-link" style="cursor: pointer" data-href="{{action('CategoryController@show', ['id' => $row->id])}}">
					<td class="table-text">{{ $row->name }}</td>
					<td class="table-text">{{ $row->color }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
    @else <h2> Er zijn geen Categorieën aangemaakt</h2>
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
