@extends('layout')

@section('title', 'Mon blog')

@section('body')

@if($posts->isEmpty())
    <p>Aucun article n'appartient à cette catégorie</p>
@else
    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
    @endforeach
@endif

@endsection

