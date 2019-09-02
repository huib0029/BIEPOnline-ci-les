@extends('layouts.app')
@section('pagetitle', 'Gebruikers')

@section('title')
	Bewerk {{ $user->name }}
@endsection

@section('content')
{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="form-group">
		<div class="col-sm-6">
			{!! Form::label('name', 'Naam', ['class' => 'control-label']) !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'De naam hier']) !!}
		</div><br>
		<div class="col-sm-6">
			{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Het emailadres hier']) !!}
		</div><br>
		<div class="col-sm-6">
			{!! Form::label('role_id', 'Rol', ['class' => 'control-label']) !!}
			{!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
		</div><br>
		<div class="col-sm-6">
			{!! Form::label('location_id', 'Locatie', ['class' => 'control-label']) !!}
			{!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
		</div><br>
		<div class="col-sm-6">
			{!! Form::label('password', 'Nieuw wachtwoord', ['class' => 'control-label']) !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Vul hier het nieuwe wachtwoord in']) !!}
		</div><br>
		<div class="col-sm-6">
			{!! Form::label('password_confirmation', 'Bevestiging nieuw wachtwoord', ['class' => 'control-label']) !!}
			{!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => 'Vul hier nogmaals het nieuwe wachtwoord in']) !!}
		</div><br>
		<div class="col-sm-6">
			<p>Klik <a href="{!! url('avatar') !!}">hier</a> om de profielafbeelding te wijzigen.</p>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
			</button>
			<a href="/user" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
		</div>
	</div>
{!! Form::close() !!}

@endsection
