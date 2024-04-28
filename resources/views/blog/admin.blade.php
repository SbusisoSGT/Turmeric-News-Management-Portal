@extends('layouts.main')

@section('page-name', "Administrator • Blog")

@section('page-includes')
	<link rel="stylesheet" href={{asset("css/blog/create.css") }}>
@endsection

@section('content')
	<div class="content-container">
		<table class="table table-striped">
			<thead>
			  <tr>
				<th scope="col">#</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			  </tr>
			  <tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			  </tr>
			  <tr>
				<th scope="row">3</th>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
			  </tr>
			</tbody>
		  </table>
	</div>
@endsection