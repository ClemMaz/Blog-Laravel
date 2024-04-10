@extends('layout')
@section('title', 'Inscription')

@section('body')
<div class="container">
    <h1 class="text-center">Inscription</h1>
    <form class="w-75 mx-auto m-y 5" action="" method="post">
        @csrf

        <x-input name="firstname" type="text" label="Prénom" value="{{old('firstname')}}"/>
        <x-input name="lastname" type="text" label="Nom" value="{{old('lastname')}}"/>
        <x-input name="email" type="email" label="Email" value="{{old('email')}}"/>
        <x-input name="password" type="password" label="Mot de passe" value="{{old('password')}}"/>
        <button class="btn btn-info">Inscription</button>

    </form>

</div>

@endsection
