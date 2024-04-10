@extends('layout')
@section('title', 'Créer une publication')

@section('body')

<div class="container">
<h1 class="text-center">Créer une publication</h1>

<form class="w-75 mx-auto my-5" method="post" enctype="multipart/form-data">
    @csrf
<x-input name="title" label="titre" value="{{old('title')}}"/>
<x-input name="image" label="image" type="file" value="{{old('image')}}"/>
<x-input name="content" label="contenu" type="textarea">{{old('content')}}</x-input>

<h5>Sélection de la catégorie : </h5>
<select name="categories[]" multiple>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

<button class="btn btn-info">Ajouter</button>

</form>
</div>
@endsection
