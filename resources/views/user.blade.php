@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User - Daten</div>
                <div class="card-body">
                @foreach($daten AS $user)
                <ul class="list-group m-2">
                    <li class="list-group-item">{{ $user['name'] }}</li>
                    <li class="list-group-item">{{ $user['vorname'] }}</li>
                    <li class="list-group-item">Wohnort: {{ $user['ort'] }}</li>
                </ul>
                @endforeach

                <p><a href="{{ url('referenzen') }}">zurück</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
