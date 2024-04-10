@extends('layout')
@section('title', 'connexion')

@section('body')
<div class="container">
    <h1 class="text-center">Connexion</h1>
    <form class="w-75 mx-auto m-y 5" action="" method="post">
        @csrf

        <x-input name="email" type="email" label="Email" value=""/>
        <x-input name="password" type="password" label="Mot de passe" value=""/>
        <button class="btn btn-info">Inscription</button>

    </form>

</div>

@endsection
