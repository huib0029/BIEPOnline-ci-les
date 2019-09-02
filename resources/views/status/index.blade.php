@extends('layouts.app')
@section('pagetitle', 'Statussen')

@section('title')
	<i class="fa fa-map-pin"></i> Statussen
	<div style="float:right">
		<a class="btn btn-success" href="{!! url('status/create') !!}">
			<i class="fa fa-bt fa-plus" aria-hidden="true"></i> Toevoegen
		</a>
	</div>
@endsection

@section('content')
	@if (count($statuses) > 0)
		<table class="table table-striped table-hover">
			<thead>
				<th class="col-sm-4">Status</th>
			</thead>
			<tbody>
				@foreach ($statuses as $status)
				<tr class="row-link" style="cursor: pointer" data-href="{{action('StatusController@show', ['id' => $status->id])}}">
					<td class="table-text">{{ $status->status}}</td>
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
