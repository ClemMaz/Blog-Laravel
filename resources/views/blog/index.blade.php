@extends('layout')

@section('title', 'Mon blog')

@section('body')

<div class="container">
    <h1 class="text-center">Mon blog</h1>
    <div class="search">
        <form action="{{ route('posts.index') }}" method="get">
            <input type="text" name="search" placeholder="Rechercher par titre">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <ul>
        @foreach($posts as $post)
        <li>
            <div class="card">
            <div class="card-header">
             Auteur : {{$post->user->firstname}} {{$post->user->lastname}}
             <p>Catégorie :
                @foreach($post->categories as $category)
                    <span>{{ $category->name }}</span>
                @endforeach
                </p>
            </div>
            <div class="card-body">
            <h4>{{$post->title}}</h4>
            <p>{{$post->content}}</p>
            </div>
            <div class="card-footer">
            <a class="btn btn-info" href="{{route('post.show', $post)}}">Voir plus</a>
            </div>
            </div>
        </li>
        @endforeach
    </ul>

    {{$posts->links()}}



</div>

@endsection
