@extends('layouts.app')
@section('pagetitle', 'Dashboard')

@section('title')
    <i class="fa fa-tachometer"></i> Dashboard
@endsection

@section('content')

    <div>
        <p>Aantal uitgeleende boeken: ({!! App\Loan::where('returndate','=','')->count(); !!}
            /{!! App\Copy::all()->count() !!})</p>
        <p>Aantal leners: {!! App\User::where('role_id','=','2')->count(); !!}</p>
        <p>Aantal administrators: {!! App\User::where('role_id','=','1')->count(); !!}</p>
    </div>

@endsection
