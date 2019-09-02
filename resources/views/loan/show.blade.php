@extends('layouts.app')
@section('pagetitle', 'Uitlenen')

@section('title')
    <div class="row">
        <div class="col-sm-8">
            Uitleen #{{$loan->id}}
        </div>
        <div class="col-sm-1">
            <a class="btn btn-primary" href="{{action('LoanController@edit', $loan->id)}}">
                <i class="fa fa-bt fa-pencil" aria-hidden="true"></i> Bewerken</a>
        </div>
        <script>
            function confirmDelete() {
                var result = confirm('Weet u zeker dat u deze uitleen wilt verwijderen?');
                if (result) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <div class="col-sm-1">
            {!! Form::open(['method' => 'DELETE', 'route' => ['loan.destroy', $loan->id], 'onsubmit' => 'return confirmDelete()']) !!}
            <button type="submit" name="button" class="btn btn-danger">
                <a><i class="fa fa-bt fa-trash" aria-hidden="true"></i> Verwijderen</a>
            </button>
        </div>
    </div>
@endsection

@section('content')
    <table class="table table-striped table-hover">
        <thead>
        <th class="col-sm-2">Status</th>
        <th class="col-sm-2">Uitleendatum</th>
        <th class="col-sm-2">Verloopdatum</th>
        <th class="col-sm-2">Inleverdatum</th>
        <th class="col-sm-2">Titel</th>
        <th class="col-sm-2">Exemplaar</th>
        </thead>
        <tbody>
        <tr class="row-link" style="cursor: pointer;"
            data-href="{{action('LoanController@show', ['id' => $loan->id]) }}">
            <td class="table-text">
                @if (isset($loan->status))
                    {{ $loan->status->status }}
                @endif
            </td>
            <td class="table-text">{{ $loan->startdate }}</td>
            <td class="table-text">{{ $loan->expirydate }}</td>
            <td class="table-text">{{ $loan->returndate }}</td>
            <td class="table-text">
                @if (isset($loan->book))
                    {{ $loan->copy->book->title }}
                @endif
            </td>
            <td class="table-text">
                @if (isset($loan->copy))
                    {{ $loan->copy->id }}
                @endif
            </td>
        </tr>
        </tbody>
    </table>
@endsection
