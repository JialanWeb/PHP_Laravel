@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-trash me-2 text-white fs-1"></i>
                    <b>{{ $post->titel }}</b>
                    <p>Wollen Sie den Datensatz wirklich löschen?</p>

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
                    
                    <form action="/post/{{$post->id}}" method="post" class="d-inline-block">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can h1 m-0"></i>
                            löschen
                        </button>
                    </form>

                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-2 float-end">
                    <i class="fa-solid fa-circle-left me-2 text-white fs-1"></i>
                    zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
