<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticles;
use App\Models\Article;
use App\Models\Category;
use App\Traits\ImageUploaderTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ImageUploaderTrait;

     /**
     * Display the specified resource.
     *
     * @param  string  $article_link
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $article = Article::where(['link' => $article, 'approved' => 1])->firstOrFail();
        $article = Article::first();
        
        return view('blog.show')->with('article', $article); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('blog.create')
                ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreArticles  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticles $request)
    {
        $request->validated();

        $image_url = $this->storeImage($request, 'public/covers');

        $article = new Article();
        $article->title = Str::title($request->input('title'));
        $article->link = Str::slug($request->input('title'));
        $article->body = $request->input('body');
        $article->cover_image = $image_url;
        $article->user_id = auth()->user()->id;
        $article->category_id = $request->input('category_id');
        $article->save();

        return redirect()->back()
                ->with('success', 'Article created successfully! Awaiting approval.');
    }
}
