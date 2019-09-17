@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="header-title">EC Coordinator List</h1>
	</div>

	<div class="row">
		@foreach($users as $user)
		<div class="col-md-6 text-center">
			<h3 class="text-uppercase"> {{ $user->faculy_name}} </h3>
			<h5> User Name : {{ $user->name }} </h5>
			<p> Email: {{ $user->email }} </p>
		</div>
		@endforeach

	</div>
</div>



@endsection