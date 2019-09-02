@extends('layouts.app')
@section('pagetitle', 'Uitlenen')

@section('title')
    Boek uitlenen
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
    {!! Form::open(['route' => ['loan.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        <div class="col-sm-6">
            {!! Form::label('startdate', 'Uitleendatum', ['class' => 'control-label']) !!}
            {!! Form::date('startdate', $today = Carbon::today(), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('expirydate', 'Verloopdatum', ['class' => 'control-label']) !!}
            {!! Form::date('expirydate', $today = Carbon::today()->addWeeks(3), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('user_id', 'Gebruiker', ['class' => 'control-label']) !!}
            {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('copy_id', 'Exemplaar', ['class' => 'control-label']) !!}
            {!! Form::select('copy_id', $copies, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status_id', 'Status', ['class' => 'control-label']) !!}
            {!! Form::select('status_id', $status, null, ['class' => 'form-control', 'placeholder' => 'Maak een keuze uit de lijst']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-bt fa-floppy-o" aria-hidden="true"></i> Opslaan
            </button>
            <a href="/loan" class="btn btn-warning" role="button">
                <i class="fa fa-bt fa-ban" aria-hidden="true"></i> Annuleren</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
