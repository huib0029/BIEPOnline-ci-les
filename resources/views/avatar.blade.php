@extends('layouts.app')
@section('pagetitle', 'Gebruikers')

@section('title')
    Bewerk je profielafbeelding
@endsection

@section('content')
    <img id="avatar" src="/uploads/avatars/{{ Auth::user()->avatar }}"><br>
    <br>
    <form enctype="multipart/form-data" action="/avatar" method="POST">
        <table class="table">
            <h3>Kies een afbeelding</h3><br>
            <input type="file" name="avatar"><br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
            <button type="submit" class="btn btn-info">Opslaan</button>
        </table>
    </form>
@endsection
