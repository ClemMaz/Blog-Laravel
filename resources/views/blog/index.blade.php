@extends('layout')

@section('title', 'Mon blog')

@section('body')

<div class="container">
    <h1 class="text-center">Mon blog</h1>
    @if(request()->get('page') <= 1)
    <h4>Bienvenue ! Retrouvez ici tous mes articles.</h4>
    <p>Presentation ipsum dolor sit amet consectetur, adipisicing elit. Amet totam, quam natus incidunt, eum earum voluptatibus vero a quisquam explicabo aperiam aut minima qui repellat id corporis quod consequuntur sapiente?
    Neque aut hic animi aspernatur consequuntur ipsa nobis quasi nam omnis magni molestias dicta, est amet maiores eveniet esse magnam? Nihil earum labore quia exercitationem ducimus facilis perspiciatis ut fuga.
    Possimus minus quibusdam sint libero rerum vero aliquid deserunt et placeat quaerat! Architecto eum non nesciunt, quisquam reiciendis temporibus ad consequatur consectetur quidem, quod fugiat sequi molestias voluptates. Distinctio, animi.
    Explicabo, voluptates odio. Ut dolores in, rem quisquam nostrum natus inventore eius repellat harum, voluptates, non quod enim et odit ducimus. A nisi enim autem cupiditate esse, neque necessitatibus mollitia?
    Quisquam voluptatum non amet tempora quod corrupti recusandae alias vitae! Necessitatibus, dignissimos. Debitis alias, inventore cumque quibusdam, minus minima, reprehenderit laboriosam ducimus sunt tenetur dolorum delectus illo mollitia sed rem.</p>
@endif
<div class="search-container">

    <div class="search">
        <form action="{{ route('posts.index') }}" method="get">
            <input type="text" name="search" placeholder="Rechercher par titre">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div class="search-category">
        <form action="{{ route('blog.index') }}" method="get">
            <select name="category" onchange="this.form.submit()">
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
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
