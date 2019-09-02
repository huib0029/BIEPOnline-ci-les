@extends('layouts.app')
@section('pagetitle', 'Locaties')

@section('title')
	Bewerk {{ $location->name }}
@endsection

@section('content')
{!! Form::model($location, ['route' => ['location.update', $location->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="form-group">
		<div class="col-sm-6">
			{!! Form::label('name', 'Naam', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'De naam van de school']) !!}
		</div>

	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
			</button>
			<a href="/location" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
		</div>
	</div>
{!! Form::close() !!}

@endsection
