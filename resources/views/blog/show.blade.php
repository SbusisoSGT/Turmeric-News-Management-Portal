@extends('layouts.main')

@section('page-name', "")

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/show.css") }}>
@endsection

@section('content')
	<div class="article-container">
		<div class="article-body">
			<span class="news-category">Economy</span>
			<span class="h1 article-title">
				{{$article->title}}
			</span>
			<div class="news-meta-data">
				<span class="news-author">{{$article->user->name}}</span>
									•
				<span class="news-timestamp">{{$article->created_at->diffForHumans()}}</span> 
			</div>
			<div class="article-cover">
				<img src={{ asset('storage/covers/'.$article->cover_image)}}>
			</div>
			<div class="article-text">
				{!! $article->body !!}
			</div>
		</div>
	</div>
@endsection