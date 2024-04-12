<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\createPostRequest;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        //$posts =  Post::query()->with('user')->orderBy('created_at', 'desc')->paginate(1);
        //return view('blog.index', compact('posts'));

        $query = Post::query()->with('user', 'categories')->orderBy('created_at', 'desc');

    if ($request->has('category')) {
        $category = $request->get('category');
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category);
        });

        $posts = $query->paginate(1);

        return view('blog.category', compact('posts')); // Retournez la vue 'category'


    }

    $posts = $query->paginate(1);
    $categories = Category::all();

    return view('blog.index', compact('posts', 'categories'));
}



    public function show(Post $post)
    {

        $post = $post->load('user', 'categories');
        return view('blog.show', compact('post'));
    }


     public function create()
    {
        $categories = Category::all();

        return view('blog.create', compact('categories'));
    }

    public function store(CreatePostRequest $request)
    {
        $path = ($request->file('image'))->store('post', 'public');
        $post = $request->validated();
        $post['image']= $path;
        $post['user_id'] = Auth::user()->id;
        //Post::query()->create($post);

        $createdPost = Post::query()->create($post);

        // Synchronisez les catégories
        $createdPost->categories()->sync($request->categories);

        return redirect()->route('blog.index')->with('ok', 'Votre publication a bien été créée');
    }

    public function edit(Post $post)
    {

        $this->authorize('update', $post);
        $categories = Category::all();

        return view('blog.edit', compact('post','categories'));
    }

    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('update', $post);

        if ($request->file('image')) {
            Storage ::disk('public')->delete($post->image);
            $path = $request->file('image')->store('post', 'public');
            $updatedPost = $request->validated();
            $updatedPost['image'] = $path;
            $post['image'] = $path;
            $post->update($updatedPost);



            return redirect()->route('blog.index')->with('ok', 'Votre publication a bien été modifiée');


        }
        $post->update($request->validated());

        return redirect()->route('blog.index')->with('ok', 'Votre publication a bien été modifiée');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->route('blog.index')->with('ok', 'Votre publication a bien été supprimée');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
    if ($search) {
        $posts = Post::where('title', 'like', "%{$search}%")->get();
        return view('blog.search', ['posts' => $posts]);
    } else {
        $posts = Post::all();
        return 'Veuillez entrer un titre valide';
    }


}



public function searchCategory(Request $request, Category $category)
{


    $posts = Post::where('category_id', $category->id)->get();
    return view('blog.category', compact('posts', 'category'));
}



}
