@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
            <div class="card-header">
                    <i class="fa-solid fa-comments h4 m-0"></i>
                    @isset($tag)
                    Alle Kommentare gefiltert nach 
                    <span class="badge bg-{{$tag->style}} fs-4">{{$tag->name}}</span>
                    <a href="/post" class="badge bg-dark float-end">Alle Kommentare anzeigen</a>
                    @else 
                        Alle Kommentare und Replies( {{$zahl}} )
                    @endisset
                    
                </div>
                <div class="card-body">
                    @if($zahl > 0)
                    <ul class="list-group h4">
                        @foreach($beitraege as $beitrag)
                        <li class="list-group-item">
                            <i class="fa-solid fa-comment h4 m-0"></i>
                            {{ $beitrag->titel }}

                            <small class="text-primary h6">
                            von <i class="fa-solid fa-user"></i>
                            @if(isset($beitrag->user_id))
                                <a href="users/{{$beitrag->user_id}}">
                                    {{ $beitrag->user->name }}
                                </a>
                                <sup class="badge bg-danger"  title="Kommentare">
                                {{ $beitrag->user->posts->count()}}
                                </sup>
                            @else
                                Unbekannt
                            @endif
                            </small>

                            <a href="/post/{{$beitrag->id}}" class="btn btn-outline-primary">
                            <i class="fa-solid fa-eye h4 m-0"></i>
                            <!-- Detailansicht -->
                            </a>
                            @auth
                            @if( auth()->id() === $beitrag->user_id )
                               <a href="/post/{{$beitrag->id}}/edit" class="btn btn-outline-warning text-secondary ms-2">
                                    <i class="fa-solid fa-pen-to-square h4 m-0"></i>
                                    <!--Bearbeiten-->
                               </a>
                               <form action="/post/{{$beitrag->id}}" method="post" class="d-inline-block">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger delete"
                                    data-title="{{$beitrag->titel}}">
                                    <i class="fa-solid fa-trash-can h4 m-0"></i>
                                    <!--löschen-->
                                </button>
                               </form>
                               <a href="post/del/{{$beitrag->id}}" class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash-can h4 m-0"></i>
                                löschen
                               </a>
                            @endif
                            @endauth
                            <div class="float-end h5">
                            @if( isset($beitrag->created_at) )
                                {{$beitrag->created_at->diffForHumans()}}
                            @else
                                Datum unbekannt
                            @endif
                            </div>

                            <div>
                            @foreach($beitrag->tags AS $tag)
                                <a href="/post/tag/{{$tag->id}}" class="badge bg-{{$tag->style}} text-decoration-none">
                                {{$tag->name}}
                                </a>
                            @endforeach
                            </div>

                        </li>
                        @endforeach
                    </ul>
                    @endif
                  
                 
                    <a href="post/create" class="btn btn-primary mt-2">Neuen Beitrag anlegen
                    </a>
                  
                    @guest
                       <b class="badge bg-warning text-dark">
                       Registrierte User Können gerne Kommentare schreiben
                       </b>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
<script>
/* const： 声明一个常量。一旦被赋值，就不能再被重新赋值
let： 用于声明可变的变量。可以被重新赋值。
 */
const deletes = document.querySelectorAll(".delete");

for(let del of deletes) {
    del.addEventListener("click", (ev) => {
        let title = del.getAttribute("data-title");
        //console.log(title);
        let choice = confirm(title+"\nWollen Sie den Beitrag wirklich löschen?");
        if(!choice) {
          ev.preventDefault();
        }
    });//ende click
}//ende for 
</script>
@endsection

