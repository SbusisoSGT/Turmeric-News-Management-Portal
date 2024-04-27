@extends('layouts.main')

@section('page-name', $tag->tag." • ".config('app.name', 'The Outcasts'))

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/show.css") }}>
	<link rel="stylesheet" href={{asset("css/blog/tags.css") }}>
	<link rel="stylesheet" href={{asset("css/inc/_subscribe.css") }}>
@endsection

@section('fb-share-config')

@endsection

@section('twt-share-config')

@endsection

@section('content')
	<div class="content-container">
		<div class="tag-header">{{$tag->tag}}</div>
		<div class="articles-container">
			@foreach($articles as $article)
				<div class="article-container">
					<div class="article-cover">
						<img src={{asset('storage/covers/'.$article->cover_image)}}>
					</div>
					<div class="article-attributes">
						<div class="article-title">
							{{$article->title}}
						</div>
						<div class="article-description">
							{{$article->description}}
						</div>
						<div class="article-author-details">
							<img src="{{asset('images/users/profile/'.$article->user->profile_pic)}}">
							<div class="article-details">
								<span class="article-author">
									<a href={{url("/authors/".$article->user->name)}}>
										{{$article->user->name }}
									</a>
								</span>
								<span class="article-createdat">
									@if ($article->updated_at == $article->created_at)
										{{$article->created_at->format('d M Y, H\hi') }}
									@else
										Updated at {{$article->updated_at->format('d M Y, H\hi') }}
									@endif
								</span>
							</div>
						</div>
						<div class="article-tags">
							@if(!empty($article->article_tags()))
								@foreach ($article->article_tags() as $tag)
									<a href={{"/blog/tags/".$tag->link}}>
										<span class="article-tag">
											{{$tag->tag}}
										</span>
									</a>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			@endforeach
		</div> 
		@include('inc._subscribe')
	</div>
@endsection 