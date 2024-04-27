@extends('layouts.main')

@section('page-name', "Post an Article • Blog")

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/create.css") }}>
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	{{-- <script src="" type="text/javascript"></script> --}}
@endsection

@section('content')
	<div class="content-container">
		<div class="card">
  			<div class="card-header">
				<h3>Create a News Article</h3>
			</div>
			<div class="card-body">
				@if ($errors->any())
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<span>{{ $error }}</span>
						@endforeach
					</div>
				@endif
				@if (session("success"))
					<div class="alert alert-success">{{session("success")}}</div>
				@endif
				
				<form method="POST" action="/news/article/store" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
					</div>
					<div class="form-group">
						<label for="category-select">Category</label>
						<select class="form-select" aria-label="Default select example" name="category_id" required>
							<option value="" selected disabled hidden>-- Select a Category --</option>
							@foreach ($categories as $category)
								<option value={{$category->id}}>{{$category->name}}</option>
							@endforeach
						  </select>
					</div>
					<div class="form-group" id='cover-image-group'>
						<label for="cover-image">Cover Image</label>
						<input type="file" class="form-control-file" name="image" required>
					</div>
					<div class="form-group">
						<label for="body">Body</label>
						<textarea class="ckeditor form-control" name="body" required>{{ old('body') }}</textarea>
					</div>
					<div class="d-grid gap-2">
						<input type="submit" class="btn btn-primary" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection