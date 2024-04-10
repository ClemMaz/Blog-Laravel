<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>@yield('Titre')</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('blog.index') }}">Accueil</a>
            @guest

            <div>
                <a href="{{route('auth.register')}}" class="btn btn-info">Inscription</a>
                <a href="{{route('auth.login')}}" class="btn btn-info">Connexion</a>
            </div>
            @endguest
            @auth()
            <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('post.create')}}" class="btn btn-warning mr-2">Créer</a>
            <form action="{{route('auth.logout')}}" method="post" class="ml-2">
                @csrf
                @method('delete')
                <button class="btn btn-info">Déconnexion</button>
            </form>
            </div>

            @endauth

        </div>

    </nav>
@if (session('ok'))
<x-flash>{{session('ok')}}</x-flash>
@endif
@if (session('ko'))
<x-flash>{{session('ko')}}</x-flash>


@endif
    @yield('body')
</body>
</html>
