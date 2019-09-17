@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="header-title">Faculty Management </h1>
	</div>

	<div class="row">


		@foreach($faculties as $faculty)
		<div class="col-md-6">
			<h3 class="text-uppercase text-center">{{$faculty->name}} </h3>
			@foreach($faculty->departments as $department)
			<h4 class="text-center"> <a href="{{ Route('subjects', $department->id)}}">{{$department->name}}</a> </h4>
			@endforeach
			
		</div>
		@endforeach

	</div>
</div>



@endsection