@extends('layouts.app')
@section('pagetitle', 'Rollen')

@section('title')
	Bewerk {{ $role->name }}
@endsection

@section('content')
{!! Form::model($role, ['route' => ['role.update', $role->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="form-group">
		<div class="col-sm-12">
			{!! Form::label('name', 'Naam', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'De naam van de rol']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
			</button>
			<a href="/role" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
		</div>
	</div>
</div>
{!! Form::close() !!}

@endsection
