@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-tag me-2 text-white fs-1"></i>
                    Tag bearbeiten
                </div>
                <div class="card-body">
                <form action="/tag/{{$tag->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group m-1">
                    <input type="text" name="name" placeholder="Name..." 
                                class="form-control" value="{{ old('name') ?? $tag->name}}" />
                    @error('name')
                    <small class="form-text text-danger">{!! $message !!}</small>
                    @enderror
                </div>
                <div class="form-group m-1">
                    <input type="text" name="style" placeholder="Style..." 
                                class="form-control" value="{{ old('style') ?? $tag->style }}" />
                    <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                </div>
                <button type="submit" class="btn btn-success mt-2">
                    <i class="fa-solid fa-circle-plus fs-1"></i>
                   Tag ändern
                </button>
                </form>

                    <a href="{{url('tag')}}" class="btn btn-primary float-end">
                        zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



