@extends('layouts.app')
@section('pagetitle', 'Boeken')

@section('title')
	Nieuw boek toevoegen
@endsection

@section('tools')
<li role="navigation">
	<a onClick="window.history.back()">
		<i class="fa fa-arrow-left"></i>&nbspTerug
	</a>
</li>
@endsection

@section('content')
{!! Form::open(['route' => ['book.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
<div class="form-group">
	<div class="col-sm-6">
		{!! Form::label('isbn', 'ISBN', ['class' => 'control-label']) !!}
		{!! Form::text('isbn', null, ['class' => 'form-control', 'placeholder' => 'ISBN nummer van het boek']) !!}
	</div>
	<!-- Read Only, deze wordt aangevuld door de API -->
	<div class="col-sm-6">
		{!! Form::label('title', 'Titel', ['class' => 'control-label']) !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'De titel wordt automatisch aangevuld']) !!}
	</div>
	<!-- Read Only, deze wordt aangevuld door de API -->
	<div class="col-sm-6">
		{!! Form::label('author_id', 'Auteur', ['class' => 'control-label']) !!}
		{!! Form::text('author_id', null, ['class' => 'form-control', 'placeholder' => 'De auteur wordt automatisch aangevuld']) !!}
	</div>
	<div class="col-sm-6">
		{!! Form::label('category_id', 'Categorie', ['class' => 'control-label']) !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-12">
		<button type="submit" class="btn btn-info">
			<i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
		</button>
		<a href="/book" class="btn btn-warning" role="button"><i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
	</div>
</div>
{!! Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">
	// Haal de waarde uit het ISBN veld wanneer deze ingevuld is
	$("#isbn").on('change', function() {
		var isbn = $(this).val();
		// Controleer of de waarde tussen de 10 - 13 karakters lang is
		if (isbn.length > 9 && isbn.length < 14) {
			console.log(isbn);
			getBookData(isbn);
		}
	});
	function getBookData(isbn) {
		$.ajax({
		// Maak een call naar de API, specificeer op ISBN
        url: "https://www.googleapis.com/books/v1/volumes?q=isbn:"+isbn
	// Haal de relevante data uit de JSON en zet deze in de juiste velden
    }).then(function(data) {
       $('#title').val(data.items[0].volumeInfo.title);
       $('#author_id').val(data.items[0].volumeInfo.authors);
    });
	}
</script>
@endsection
