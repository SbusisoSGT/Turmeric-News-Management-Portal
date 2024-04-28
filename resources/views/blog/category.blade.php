@extends('layouts.main')

@section('page-name', $articles->first()->category->name)

@section('page-includes')
<link rel="stylesheet" href={{ asset('css/index.css') }}>
@endsection

@section('content')
<div class="main-content">
    <h1 class="h2">{{ $articles->first()->category->name }} News</h1>
    <div class="news-card-container" id="main-news-card">
        <a href="/news/article/{{$articles->first()->link}}">
            <img src={{ asset('storage/covers/'.$articles->first()->cover_image)}} alt="">
        </a>
        <div class="news-card-details">
			<a href="/news/categories/{{$articles->first()->category->name}}">
                <span class="news-publication">{{$articles->first()->category->name}}</span>
            </a>
            <h2 class="news-title">{{$articles->first()->title}}</h2>
            <p class="news-summary">
                {{Str::substr($articles->first()->body, 3, 300)}} . . . 
                <a href="/news/article/{{$articles->first()->link}}">
                    <span class="read-more-button">read more</span>
                </a>
            </p>
            <div class="news-meta-data">
				<span class="news-author">{{$articles->first()->user->name}}</span>
									•
				<span class="news-timestamp">{{$articles->first()->created_at->diffForHumans()}}</span> 
			</div>
        </div>
    </div>
    <div class="news-container">
        @for ($i = 1; $i < $articles->count(); $i++)
            <div class="news-card-container">
                <a href="/news/article/{{$articles[$i]->link}}" target="_blank">
                    <img src="{{ asset('storage/covers/'.$articles[$i]->cover_image)}}" alt="">
                </a>
                <div class="news-card-details">
					<a href="/news/categories/{{$articles[$i]->category->name}}">
						<span class="news-publication">{{$articles[$i]->category->name}}</span>
					</a>
                    <h2 class="news-title">{{$articles[$i]->title}}</h2>
                    <p class="news-summary">
                        {{Str::substr($articles[$i]->body, 3, 300)}} . . . 
                        <a href="/news/article/{{$articles[$i]->link}}">
                            <span class="read-more-button">read more</span>
                        </a>
                    </p>
                    <div class="news-meta-data">
                        <span class="news-author">{{$articles[$i]->user->name}}</span>
                                            •
                        <span class="news-timestamp">{{$articles[$i]->created_at->diffForHumans()}}</span> 
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

@endsection

@section('js-code')
    
@endsection