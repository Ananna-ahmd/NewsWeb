<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['author', 'category'])->get(); 
        return view('articles.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
      
        Article::create($validated);

        return redirect('articles')->with('flash_message', 'Article Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with(['author', 'category'])->findOrFail($id);
        return view('articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {


        $article = Article::findOrFail($id);
        $article->update($request->validated());
        return redirect('articles')->with('flash_message', 'Article Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        return redirect('articles')->with('flash_message', 'Article Deleted!');
        
    }
}
