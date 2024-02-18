@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-comments me-2 text-white fs-1"></i>
                    Beitrag bearbeiten
                </div>
                <div class="card-body">
                <form action="/post/{{$post->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titel">Titel</label>
                    <input type="text" id="titel" name="titel1"  class="form-control" value="{{ old('titel1') ?? $post->titel}}" />
                    <small class="form-text text-danger">{!! $errors->first('titel1') !!}</small>
                </div>
                <div class="form-group">
                        <label for="kommentar">Kommentar</label>
                        <textarea id="kommentar" name="kommentar1" class="form-control">{{ old('kommentar1') ?? $post->comment}}</textarea> 
                        <small class="form-text text-danger">{!! $errors->first('kommentar1') !!}</small>
                </div>
                <button type="submit" class="btn btn-success mt-2">
                <i class="fa-solid fa-wrench fs-1"></i>
                 Beitrag ändern
                </button>
                </form>

                    <a href="{{url('post')}}" class="btn btn-primary float-end">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
