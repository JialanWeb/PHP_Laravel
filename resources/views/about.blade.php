@extends('layouts.app')

@section('title', 'Über uns')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">About</div>
                <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, </p>
                <?php
                #use App\Models\Post; 
                #$posts = Post::all(); 这两行可以用下面的一行替代
                $posts = DB::select('select * from posts');
        
                ?>

                @foreach($posts as $post)
                <ul class="list-group h4 my-2 alert alert-primary p-2">
                    <li class="list-group-item">{{$post->titel}}</li>
                    <li class="list-group-item">{{$post->comment}}</li>
                </ul>
                @endforeach
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                @php
                $users = DB::select('select * from users');
                @endphp

                @foreach($users as $user)
                <ul class="list-group h4 my-2 alert alert-primary p-2">
                    <li class="list-group-item">{{$user->name}}</li>
                    <li class="list-group-item">{{$user->email}}</li>
                </ul>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
