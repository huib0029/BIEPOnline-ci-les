@extends('layouts.app')
@section('pagetitle', 'Statussen')

@section('title')
	Bewerk {{ $status->status }}
@endsection

@section('content')
{!! Form::model($status, ['route' => ['status.update', $status->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="form-group">
		<div class="col-sm-6">
			{!! Form::label('status', 'Naam', ['class' => 'control-label']) !!}
			{!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'De status benaming']) !!}
		</div>

	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
			</button>
			<a href="/status" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
		</div>
	</div>
{!! Form::close() !!}

@endsection
