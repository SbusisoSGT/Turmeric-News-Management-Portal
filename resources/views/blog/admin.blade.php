@extends('layouts.main')

@section('page-name', "Administrator • Blog")

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/create.css") }}>
@endsection

@section('content')
	<div class="container">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<table class="table table-striped">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">Category</th>
				<th scope="col">Body</th>
				<th scope="col">View</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($articles as $key => $article)
					<tr>
						<th scope="row">{{ $key + 1 }}</th>
						<td>{{ $article->title }}</td>
						<td>{{ $article->category->name }}</td>
						<td>{{ Str::substr($article->body, 3, 90) }} . . . </td>
						<td> 
							<a href="/news/article/{{ $article->link }}" target="_blank">
								<button class="btn btn-primary">View</button>
							</a>
						</td>
						<td>
							@if ( !$article->approved )
								<button class="btn btn-success" onclick="event.preventDefault(); document.getElementById('approve-form').submit();">Approve</button>
								<form id="approve-form" action="/news/approve" method="POST" class="d-none">
									@csrf
									<input type="text" name="article_id" value="{{$article->id}}" hidden>
								</form>
							@else	
								<button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</button>
								<form id="delete-form" action="/news/delete" method="POST" class="d-none">
									@csrf
									<input type="text" name="article_id" value="{{$article->id}}" hidden>
								</form>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		  </table>
	</div>
@endsection