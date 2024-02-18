<div class="container bg-light p-2">
<div class="col-12 h4">
<?php
    $hours = date('H');
    $greet = 'Hallo';
    if($hours < 2) $greet = 'Hallo zu später Stunde';
    else if($hours < 10) $greet = 'Guten Morgen';
    else if($hours < 17) $greet = 'Guten Tag';
    else if($hours < 24) $greet = 'Guten Abend';
?>
    <?=$greet?> <b class="text-secondary">{{ auth()->user()->name }}</b>, schön, dass Du da bist!

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline-block">
    @csrf
        <button class="btn btn-sm btn-warning">
        <i class="fa-solid fa-power-off"></i>
        </button>
    </form>
    
    <nav class="navbar navbar-expand">
        <ul class="navbar-nav me-auto fw-bold h5">
            <li class="nav-item">
                <a href="" class="nav-link badge bg-primary m-1">
                <i class="fa-solid fa-comments h4 m-0"></i>
                Kommentare
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link badge bg-info m-1">
                <i class="fa-solid fa-pen-to-square h4 m-0"></i>
                Profil bearbeiten
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link badge bg-danger m-1">
                <i class="fa-solid fa-trash-can h4 m-0"></i>
                Account löschen
                </a>
            </li>
        </ul>
    </nav>
</div>
</div>
