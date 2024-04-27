@extends('layouts.main')

@section('page-name', "Edit an Article • Blog")

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/create.css") }}>
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<script src={{asset("js/blog/create.js") }} type="text/javascript"></script>
@endsection

@section('content')
	<div class="content-container">
		<div class="card">
  			<div class="card-header">
				<h3>Edit an Article Post</h3>
			</div>
			<div class="card-body">
				@if ($errors->any())
					<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
								<span>{{ $error }}</span><br/>
							@endforeach
					</div>
				@endif
				@if (session("success"))
					<span class="alert alert-success">{{session("success")}}</span>
				@endif

				<form method="POST" action="/blog/articles" enctype="multipart/form-data">
					@csrf
                    @method("PUT")
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{$article->title}}">
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea name="description" class="form-control" >{{$article->description}}</textarea>
					</div>
					<div class="form-group">
						<label for="quote">Quote</label>
						<textarea type="text" name="quote" class="form-control">{{$article->quote}}</textarea>
					</div>
					<div class="form-group">
						<label for="tags">Tags</label>
						<input type="text" name="tags" class="form-control" placeholder="e.g Beauty, Self-worth, Independence" value="{{ old('tags') }}">
						<span id="tag-info">Seperate tags by comma</span>
					</div>
					<div class="form-group">
						<label for="allow-comments">Allow Comments</label><br/>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="allow_comments" value="1" disabled>
							<label class="form-check-label" for="allow-comments1">Yes</label>
						</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="allow_comments" value="0" checked>
						<label class="form-check-label" for="allow-comments2">No</label>
						</div>
					</div>
					<div class="form-group">
						<label for="cover-image">Cover Image</label>
						<input type="file" class="form-control-file" name="image">
					</div>
					<div class="form-group">
						<label for="body">Body</label>
						<textarea class="ckeditor form-control" name="body">{{ $article->body}}</textarea>
					</div>
					<input type="submit" class="btn btn-primary btn-block" value="Submit">
				</form>
			</div>
		</div>
	</div>
@endsection

@section('js-code')
    <script>
        let links = document.querySelector(".links");
        links.children[1].firstElementChild.id = "active-link";
    </script>
@endsection