@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-comment me-2 text-white fs-1"></i>
                    <b>{{ $post->titel }}</b>

                    <span class="float-end">
                        geschrieben am: <i>{{ $post->created_at ? $post->created_at->format('d.F.Y H:i') : 'unbekannt' }}</i>

                        @if($post->updated_at > $post->created_at)
                           <b> </b>
                           geändert am: <i>{{ $post->updated_at ? $post->updated_at->format('d.m.Y H:i') : 'unbekannt'}}</i>
                        @endif
                    </span>
                </div>
                <div class="card-body">
                    <p>{!! nl2br($post->comment) !!}</p>

                    <!-- <p>{{-- $replies --}}</p> 里面也是一种注释方法-->
                    @if($replies->count() > 0)
                        Antworten<sup class="badge bg-danger">{{$replies->count()}}</sup>
                    @endif

<!-- ################################################################## -->
                    <form action="/post" method="post" class="bg-secondary p-2 rounded m-2">
                    @csrf
                    <div class="form-group m-1">
                        <input type="text" name="titel1" value="{{ old('titel1') }}" class="form-control" placeholder="Titel..." />
                        <small class="form-text text-danger">{!! $errors->first('titel1') !!}</small>
                    </div>
                                                                                            
                    <div class="form-group m-1">
                        <textarea name="kommentar1" class="form-control" placeholder="Kommentar...">{{ old('kommentar1') }}</textarea>
                        <small class="text-danger">{!! $errors->first('kommentar1') !!}</small>
                    </div>
                    <input type="hidden" name="reply" value="{{$post->id}}">
                    @auth                                                                        
                    <button type="submit" class="btn btn-primary mt-2">
                            <i class="fa-solid fa-circle-plus me-2 fs-1"></i>
                            Antwort
                    </button>
                    @endauth
                    @guest 
                        <b class="badge bg-warning text-dark">Registrierte User können gerne Kommentare schreiben</b>
                    @endguest
                    </form>
<!-- ################################################# -->                 
                    @foreach($replies AS $value)
                    <ul class="list-group m-2">
                        <li class="list-group-item">
                        {{ $value->created_at->diffForHumans() }}
                        <br>
                        <b>{{ $value->titel }}</b>
                        (<i class="fa-solid fa-user text-danger"></i>{{ $value->user->name }})
                        </li>
                        <li class="list-group-item">{!! nl2br($value->comment) !!}</li>
                    </ul>
                    @endforeach

                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-2">
                    <i class="fa-solid fa-circle-left me-2 text-white fs-1"></i>
                    zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
