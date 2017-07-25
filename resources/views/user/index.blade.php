@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>
				@if(Session::has('status'))
                    <p class="alert alert-success">{{ Session::get('status') }}</p>
                @endif
                <div class="panel-body">
					<table class="table">
				        <thead>
				          <th>#</th>
				          <th>Name</th>
				          <th>Email</th>
				          <th>Created at</th>
				          <th>Actions</th>
				        </thead>

				        <tbody>
				          @foreach ($users as $user)
				            <tr>
				              <th> {{ $user->id }} </th>
				              <td> {{ $user->name }} </td>
				              <td> {{ $user->email }} </td>
				              <td> {{ $user->created_at }}</td>
				              <td> <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger btn-xs">Delete</a>
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