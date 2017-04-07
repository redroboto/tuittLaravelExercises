@extends('layout.master')

@section ('title','Display Article')

@section('content')

	<div class="container">
		<p>{{ $article->title }}</p>
		<p>{{ $article->content }}</p>
	
			<a href='{{url("articles/$article->id/edit")}}'><button class="btn btn-warning" name="edit">Edit</button></a>
			<a href='{{url("articles/$article->id/delete")}}'><button class="btn btn-danger" name="delete">Delete</button></a>

	</div>
@endsection