@extends('layouts.app')
@section('pagetitle', 'Boeken')

@section('title')
	Bewerk {{ $book->name }}
@endsection

@section('content')
	{!! Form::model($book, ['route' => ['book.update', $book->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
	<div class="col-xs-12">
		<div class="form-group">
			<div class="form-group">
				<div class="col-sm-6">
					{!! Form::label('isbn', 'ISBN', ['class' => 'control-label']) !!}
					{!! Form::text('isbn', $book->isbn, ['class' => 'form-control', 'placeholder' => 'ISBN nummer van het boek']) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::label('title', 'Titel', ['class' => 'control-label']) !!}
					{!! Form::text('title', $book->title, ['class' => 'form-control', 'placeholder' => 'De titel wordt automatisch aangevuld']) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::label('author_id', 'Auteur', ['class' => 'control-label']) !!}
					{!! Form::select('author_id', $authors, null, ['class' => 'form-control', 'placeholder' => 'De auteur wordt automatisch aangevuld']) !!
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
		</div>
    </div>
{!! Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">
	$("#isbn").on('change', function() {
		var isbn = $(this).val();
		if (isbn.length > 9 && isbn.length < 14) {
			console.log(isbn);
			getBookData(isbn);
		}
	});
	function getBookData(isbn) {
		$.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q="+isbn
    }).then(function(data) {
       $('#title').val(data.items[0].volumeInfo.title);
    });
	}
</script>
@endsection
