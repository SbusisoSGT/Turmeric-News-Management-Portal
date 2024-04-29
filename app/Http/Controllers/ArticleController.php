<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticles;
use App\Models\Article;
use App\Models\Category;
use App\Traits\ImageUploaderTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ImageUploaderTrait;


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('approved', 1)
                        ->latest()
                        ->get();

        return view('index')
                ->with('articles', $articles); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(string $category)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $articles = $category
                        ->articles()
                        ->where('approved', 1)
                        ->latest()
                        ->get();

        return view('blog.category')
                ->with('articles', $articles); 
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $article_link
     * @return \Illuminate\Http\Response
     */
    public function show($article_link)
    {
        if( Auth::check() && Auth::user()->role->name == 'Admin')
            $article = Article::where(['link' => $article_link])->firstOrFail();
        else
            $article = Article::where(['link' => $article_link, 'approved' => 1])->firstOrFail();
        
        return view('blog.show')->with('article', $article); 
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $article_link
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {   
        $articles = Article::latest()->get();
        
        return view('blog.admin')->with('articles', $articles); 
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
     * Approve articles published by authors
     *
     * @param  App\Http\Requests\StoreArticles  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {
        $article = Article::find($request->input('article_id'));

        $article->approved = 1;
        $article->save();
        
        return back()
                    ->with([
                        'articles', Article::latest()->get(),
                        'status' => 'Article approved successfully!'
                ]); 
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

      /**
     * Delete an article published by author
     *
     * @param  App\Http\Requests\StoreArticles  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $article = Article::find($request->input('article_id'));

        $article->delete();
        
        return back()
                ->with([
                    'articles', Article::latest()->get(),
                    'status' => 'Article deleted successfully!'
            ]); 
    }
}
