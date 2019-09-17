@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="header-title">Faculty Name: {{$faculty->name}}</h1>
	</div>

	<div class="row">
		@foreach($departments as $department)
		<div class="col-md-12" >
			<h3 class="text-uppercase text-center">{{$department->name}} </h3>
		</div>
		@endforeach

	</div>
</div>



@endsection