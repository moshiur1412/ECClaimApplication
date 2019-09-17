@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1 class="header-title"> {{$departmant->name}} </h1> 
	</div>
	<div class="row">
		<div class="table-responsive">
			<table class="table table-borderless" id="table">
				<tr>
					<th>Serial No</th>
					<th>Subject Name </th>
					<th>Assessment Title </th>
					<th>Assessment Deadline </th>
				</tr>

				<?php $no=1; ?>
				@foreach($subjects as $subject)
				<tr class="subject{{$subject->id}}">
					<td> {{$no++}} </td>
					<td> {{$subject->name}} </td> 
					<td> {{$subject->assessment_title}} </td>
					<td> {{$subject->deadline}} </td> 
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection