<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->except(['image', '_token']);
        $data['author_id'] =  Auth::user()->id;
        if ($request->hasFile('image')) {
            $extentaion = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->file('image')->getClientOriginalName();
            $encripton = md5($imageName) . '.' . $extentaion;
            $data['image'] = $encripton;
            $request->file('image')->move('img',$encripton);

        }

     

        Article::create($data);

        return redirect('articles')->with('flash_message', 'Article Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articles = Article::findOrFail($id);
        return view('articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Article::findOrFail($id);
        return view('articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        $data = $request->except(['image', '_token']);
        $data['author_id'] =  Auth::user()->id;
        if ($request->hasFile('image')) {
            $extentaion = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->file('image')->getClientOriginalName();
            $encripton = md5($imageName) . '.' . $extentaion;
            $data['image'] = $encripton;
            $request->file('image')->move('img',$encripton);
            
        }


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
