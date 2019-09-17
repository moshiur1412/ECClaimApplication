@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="header-title"> {{ $departments->name }} </h1>
		
	</div>
	
	<div class="row">
		
		@foreach($subjects as $subject)

		<h2 class="text-center">{{$subject->name}} </h2>

		@endforeach

	</div>
</div>



@endsection