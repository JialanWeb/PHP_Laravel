<?php
$greeting = 'Hallo Laravel';

echo $greeting;
?>
<br>

{{ $greeting }}

<br>
@if(isset($greeting))
   Greeting ist da
@else
   Greeting ist  nicht da
@endif