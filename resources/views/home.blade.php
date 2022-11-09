<!doctype html>
<html lang="fr">
<body>
@extends('layouts.master')
@section('content')
    <div>
        <h1 class="bvn"> Bienvenue dans Manga World !</h1>
    </div>

    @if(isset($unoErreur))
        <h1 style="color:red">{{$unoErreur}}</h1>
    @endif
@stop
</body>
</html>

