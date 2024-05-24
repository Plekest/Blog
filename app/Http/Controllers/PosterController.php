<?php

namespace App\Http\Controllers;

use App\Models\Post;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $cleanContent = $purifier->purify($request->content);

        $post = Post::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);

        $post->content = $cleanContent;
        $post->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $id)->get();
        dd($posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posters.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);

        $cleanContent = $purifier->purify($request->content);

        // Encontrar o post
        $post = Post::find($id);

        if ($post) {
            // Atualizar o post
            $post->title = $request->title;
            $post->content = $cleanContent;
            $post->save();

            return redirect()->route('home')->with('success', 'Post atualizado com sucesso.');
        } else {
            // Redirecionar com mensagem de erro se o post não for encontrado
            return redirect()->route('home')->with('error', 'Post não encontrado.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect()->back();
    }
}
