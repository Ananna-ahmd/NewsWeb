<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'nullable|exists:profiles,id',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);
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
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'nullable|exists:profiles,id',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);
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
