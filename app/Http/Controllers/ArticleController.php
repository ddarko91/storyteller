<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('topic')) {

            $articles = Topic::where('name', request('topic'))->firstOrFail()->articles;

        } else {

            $articles = Article::latest()->get();
        }


        return view('articles.index', [
            'articles'  => $articles]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create', [
            'topics' => Topic::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateArticle();
        
        $article = new Article(request(['title', 'slug', 'content']));
        $article->user_id = Auth::id();
        $article->save();

        $article->topics()->attach(request('topic'));

        return redirect(route('articles.index'))->with('success', 'Article Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if ($article->user_id == auth()->id()) {

            return view('articles.edit', [
                'article' => $article, 
                'topics' => Topic::all()
                ]);

        } else {

            abort(404);

        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('articles.show',$article))->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = Article::find($article->id);

        $article->delete();

        return redirect(route('articles.index'))->with('danger', 'Article Deleted!');


    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'slug'  => 'required',
            'content' => 'required',
            'topics'  => 'exists:topics,id'
        ]);
    }
}
