@extends('layouts.app')
@section('pagetitle', 'Categorieën')

@section('title')
	Nieuwe categorie toevoegen
@endsection

@section('tools')
<li role="navigation">
	<a onClick="window.history.back()">
		<i class="fa fa-arrow-left"></i>&nbspTerug
	</a>
</li>
@endsection

@section('content')
{!! Form::open(['route' => ['category.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="col-sm-6">
		{!! Form::label('name', 'Naam', ['class' => 'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'De naam van de categorie']) !!}
	</div>
	<div class="col-sm-6">
		{!! Form::label('color', 'Kleur', ['class' => 'control-label']) !!}
		{!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'De kleur van de categorie']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-12">
		<button type="submit" class="btn btn-info">
			<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
		</button>
		<a href="/category" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
	</div>
</div>
{!! Form::close() !!}
@endsection
