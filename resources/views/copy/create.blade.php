@extends('layouts.app')
@section('pagetitle', 'Exemplaren')

@section('title')
    Nieuw exemplaar toevoegen
@endsection

@section('tools')
    <li role="navigation">
        <a onClick="window.history.back()">
            <i class="fa fa-arrow-left"></i>&nbspTerug
        </a>
    </li>
@endsection

@section('content')
    {!! Form::open(['route' => ['copy.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        <div class="col-sm-6">
            {!! Form::label('datebought', 'Aanschafdatum', ['class' => 'control-label']) !!}
            {!! Form::date('datebought', null, ['class' => 'form-control', 'placeholder' => 'De aanschafdatum']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('location_id', 'Locatie', ['class' => 'control-label']) !!}
            {!! Form::select('location_id', $locations, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('book_id', 'Boeken', ['class' => 'control-label']) !!}
            {!! Form::select('book_id', $books, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status_id', 'Status', ['class' => 'control-label']) !!}
            {!! Form::select('status_id', $statuses, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
            </button>
            <a href="/copy" class="btn btn-warning" role="button">
                <i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
