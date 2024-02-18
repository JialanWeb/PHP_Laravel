@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Startseite</div>
                <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, </p>
                {{ '<h2>Hallo</h2>' }} 

                {!! '<h2>Hallo</h2>' !!}  

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
