@extends('layouts.app')

@section('content')
<div class="container dunkel p-4 bg-opacity-75">
    <div class="row">
        <div class="col-md-12">
            <div class="card blau">
                <div class="card-header">
                    <i class="fa-solid fa-tags text-white fs-1 m-0"></i>
                    Alle Tags ( {{$zahl}} )
                </div>
                <div class="card-body">
                    @if($zahl > 0)
                    <ul class="list-group h4">
                        @foreach($beitraege as $beitrag)
                            <li class="list-group-item">
                                <span class="btn btn-outline-{{$beitrag->style}}" 
                                    style="text-shadow: 1px 1px 1px #000; letter-spacing: 3px;">
                                    <i class="fa-solid fa-tree h1 fw-bold"></i>
                                    {{ $beitrag->name }}
                                </span>

                               <a href="/tag/{{$beitrag->id}}/edit" class="btn btn-outline-dark">
                                    <i class="fa-solid fa-pen-to-square h1"></i>
                                    Bearbeiten
                               </a>
                               <form action="/tag/{{$beitrag->id}}" method="post" class="d-inline-block">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-dark delete"
                                    data-title="{{$beitrag->titel}}">
                                    <i class="fa-solid fa-trash-can h1"></i>
                                    <!--löschen-->
                                </button>
                               </form>
                            

                           </li>
                        @endforeach
                    </ul>
                    @endif

                    <a href="tag/create" class="btn btn-primary mt-2">
                        Neuen Tag anlegen
                    </a>
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

