@extends('layouts.app')
@section('pagetitle', 'Auteurs')

@section('title')
	Nieuwe auteur toevoegen
@endsection

@section('tools')
<li role="navigation">
	<a onClick="window.history.back()">
		<i class="fa fa-arrow-left"></i>&nbspTerug
	</a>
</li>
@endsection

@section('content')
<?php use Carbon\Carbon; ?>
{!! Form::open(['route' => ['author.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="col-sm-6">
		{!! Form::label('name', 'Auteur', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Naam van de auteur']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-12">
		<button type="submit" class="btn btn-info">
			<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
		</button>
		<a href="/author" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
	</div>
</div>

{!! Form::close() !!}



@endsection
