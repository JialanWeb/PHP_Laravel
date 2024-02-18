@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                  <i class="fa-solid fa-users me-2 text-white fs-1"></i>
                    Alle User({{ $users->count() }})
                </div>
                <div class="card-body">
                    @if($users->count() > 0)
                    <ul class="list-group h4">
                        @foreach($users as $user)
                        <li class="list-group-item">
                        <i class="fa-solid fa-user h4 m-0"></i>
                            {{$user->name}}
                            <a href="/users/{{$user->id}}" class="btn btn-outline-primary">
                                <i class="fa-solid fa-eye h4 m-0"></i>
                                Detailansicht
                            </a>

                            <span class="float-end h5">
                                 angemeldet(
                                     @if( isset($user->created_at) )
                                         {{ $user->created_at->diffForHumans() }}
                                     @else
                                        Datum unbekannt
                                     @endif
                                 )
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    Noch kein User vorhanden
                    @endif
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




