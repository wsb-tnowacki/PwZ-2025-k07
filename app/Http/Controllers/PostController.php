<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return "index";
        $posty = Post::all();
        return view('post.index',compact('posty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post(); 
       /*  $post->tytul = request('tytul');
        $post->autor = request('autor');
        $post->email = request('email');
        $post->tresc = request('tresc');
        $post->save(); */
        /* $request->validate([
            'tytul' => 'required|min:3|max:200',
            'autor' => ['required','min:4','max:100'],
            'email' => ['required','min:3','max:200','email:dns,rfc'],
            'tresc' => 'required','min:5',
        ]); */
        
        $post->create($request->all());
        return redirect()->route('post.index')->with('message', "Dodano poprawnie posta");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    //public function show(string $post)
    {
        //return "show + post: $post";
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //return "edit + post: $post";
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        
        //return "update + post: $post";
        $post->update($request->all());
        return redirect()->route('post.index')->with('message', "Zmieniono poprawnie posta");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //return "destroy + post: $post";
        $post->delete();
        return redirect()->route('post.index')->with('message', "Usunięto poprawnie posta")->with('class', 'danger');
    }
}
