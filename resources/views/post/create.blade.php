@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-comments me-2 text-white fs-1"></i>
                    Neuen Kommentar schriben
                </div>
                <div class="card-body">
                <form action="/post" method="post">
                @csrf
                <div class="form-group">
                    <label for="titel">Titel</label>
                    <input type="text" id="titel" name="titel1"  class="form-control" value="" />
                </div>
                <div class="form-group">
                        <label for="kommentar">Kommentar</label>
                        <textarea id="kommentar" name="kommentar1" class="form-control">{{ old('kommentar1') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">
                <i class="fa-solid fa-circle-plus fs-1"></i>
                neuen Beitrag anlegen
                </button>
                </form>

                    <a href="{{url('post')}}" class="btn btn-primary float-end">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
