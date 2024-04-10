@extends('layout')
@section('title', 'Modifier une publication')

@section('body')

<div class="container">
<h1 class="text-center">Modifier une publication</h1>

<form class="w-75 mx-auto my-5" action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

<x-input name="title" label="Titre" value="{{$post->title}}"/>
<x-input name="image" label="Image" type="file"/>
<x-input name="content" label="Contenu" type="textarea">{{$post->content}}</x-input>
<button class="btn btn-info">Modifier</button>

</form>
</div>
@endsection
