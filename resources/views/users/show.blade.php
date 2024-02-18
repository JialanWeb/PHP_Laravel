@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    Mein Motto:
                    <p class="bg-primary text-light p-2 text-center fs-2">
                        {{$user->motto ? mb_strtoupper($user->motto) : 'Kein Motto'}}
                    </p>
                    <i class="fa-solid fa-user me-2 text-white fs-1"></i>
                    <b class="h1">{{ $user->name }}</b>
                </div>
                <div class="card-body">
                    <p>
                    {!! $user->ueber_mich ? nl2br($user->ueber_mich) : 'war zu faul um Info zu chreiben' !!}
                    </p>

                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-2">
                        <i class="fa-solid fa-circle-left fs-4"></i>
                        zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




