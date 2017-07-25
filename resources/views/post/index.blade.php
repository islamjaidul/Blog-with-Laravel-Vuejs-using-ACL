@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Posts</div>
				@if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                @endif
                <div class="panel-body">
					<table class="table">
				        <thead>
				          <th>#</th>
				          <th>Title</th>
				          <th>Body</th>
				          <th>Created By</th>
				          <th>Actions</th>
				        </thead>

				        <tbody>
				          @foreach ($posts as $post)
				            <tr>
				              <th> {{ $post->id }} </th>
				              <td> {{ substr($post->title, 0, 25) }} {{ strlen($post->title) > 25 ? "..." : ""}} </td>
				              <td> {{ substr($post->body, 0, 25) }} {{ strlen($post->body) > 25 ? "..." : ""}} </td>
				              <td> {{ $post->user->name }}</td>
				              <td> <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-xs">Edit</a>
				                <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger btn-xs">Delete</a> </td>
				            </tr>
				          @endforeach
				        </tbody>
      				</table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection