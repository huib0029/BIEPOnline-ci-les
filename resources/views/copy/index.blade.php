@extends('layouts.app')
@section('pagetitle', 'Exemplaren')

@section('title')
    <i class="fa fa-tags"></i> Exemplaren
    <div style="float:right">
        <a class="btn btn-success" href="{!! url('copy/create') !!}">
            <i class="fa fa-bt fa-plus" aria-hidden="true"></i> Toevoegen
        </a>
    </div>
@endsection

@section('content')
    @if (count($copies) > 0)
        <table class="table table-striped table-hover">
            <thead>
            <th class="col-sm-3">Boek</th>
            <th class="col-sm-3">Datum gekocht</th>
            <th class="col-sm-3">Staat</th>
            <th class="col-sm-3">Locatie</th>
            </thead>
            <tbody>
            @foreach ($copies as $copy)
                <tr class="row-link" style="cursor: pointer"
                    data-href="{{action('CopyController@show', ['id' => $copy->id])}}">
                    <td class="table-text">
                        @if (isset($copy->book))
                            {{ $copy->book->title }}
                        @endif
                    </td>
                    <td class="table-text">{{ $copy->datebought }}</td>
                    <td class="table-text">
                        @if (isset($copy->status))
                            {{ $copy->status->status }}
                        @endif
                    </td>
                    <td class="table-text">
                        @if (isset($copy->location))
                            {{ $copy->location->name }}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function ($) {
            $(".row-link").click(function () {
                window.document.location = $(this).data("href");
            });
            $('#cohort-tabs a:first').tab('show') // Select first tab
        });
    </script>
@endsection
