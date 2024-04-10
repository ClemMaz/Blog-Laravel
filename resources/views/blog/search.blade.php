@extends('layout')

@section('title', 'Résultats de la recherche')

@section('body')
@if($posts->isNotEmpty())
@foreach($posts as $post)
    <div class="card">
        
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
        @endforeach
    @else
        <p>Aucun résultat trouvé pour "{{ request()->query('search') }}"</p>
    @endif
@endsection
