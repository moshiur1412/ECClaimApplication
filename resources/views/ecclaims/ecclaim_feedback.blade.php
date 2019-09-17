@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row">
		
		<h1 class="header-title">{{ trans('ecclaim.claim_detials') }}</h1>
		
	</div>
	
	<div class="row">
		<div class="table-responsive">
			<table class="table table-borderless" id="table">
				<tr>
					<th>{{ trans('ecclaim.table_subject_name') }} </th>
					<th>{{ trans('ecclaim.table_claim_seding_time')}}</th>
					<th>Claim Criteria </th>
					<th>{{ trans('ecclaim.claim_case') }} </th>
					<th>{{ trans('ecclaim.claim_evidence') }} </th>
					<th>{{ trans('ecclaim.table_status') }} </th>
				</tr>
				{{ csrf_field() }}
				@foreach($ecclaims as $ecclaim)			
				<tr class="ec_claim{{$ecclaim->id}}">
					<td> {{$ecclaim->subject_name}} </td> 
					<td> {{Carbon\Carbon::parse($ecclaim->created_at)->format('jS F Y')}} </td> 
					<td> {{$ecclaim->claim_criteria}} </td> 
					<td style="width: 25%;"> {{$ecclaim->note}} </td>
					<td> <a href="/uploads/{{ $ecclaim->evidence_01 }}">{!! str_limit($ecclaim->evidence_01, 15) !!}</a>
						<br> <a href="/uploads/{{ $ecclaim->evidence_02 }}">{!! str_limit($ecclaim->evidence_02, 15) !!}</a>
						<br> <a href="/uploads/{{ $ecclaim->evidence_03 }}">{!! str_limit($ecclaim->evidence_03, 15) !!}</a> 
					</td>
					<td style="width: 25%"> 
						@if($ecclaim->status == 'pending')
						<button class="edit-modal btn btn-primary" data-id="{{$ecclaim->id}}" data-claim_criteria="{{$ecclaim->claim_criteria}}" data-status="{{$ecclaim->status}}" >Accept</button>
						<button class="delete-modal btn btn-danger" data-id="{{$ecclaim->id}}" data-claim_criteria="{{$ecclaim->claim_criteria}}" data-status="{{$ecclaim->status}}" >  Reject </button>

						@else
						{{$ecclaim->status }}

						@endif
					</td>
				</tr>
				@endforeach
			</table>
			{{$ecclaims->links()}}
		</div>
		
		
	</div>


	<!-- JavaScript Dialog Box -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<label for="student_name" class="control-label col-sm-4">Claim Criteria</label>
							<div class="col-sm-7">
								<input type="hidden" name="id" id="id">
								<input type="text" class="form-control" name="claim_criteria" id="claim_criteria" disabled="disabled">
							</div>
						</div>

						<div class="form-group">
							<label for="claim_feedback" class="control-label col-sm-4">Feedback Message</label>
							<div class="col-sm-7">

								<textarea name="status" id="status" cols="42" rows="6"></textarea>

							</div>
						</div>

					</form>

					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button"></span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal"> Close </button>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

					// add users -->

				// Edit Data (Modal and function edit data)
				$(document).on('click','.edit-modal', function(){

					$('#footer_action_button').text(" Accept");

					$('.actionBtn').addClass('btn-success');
					$('.actionBtn').addClass('edit');

					$('.modal-title').text('Send Feedback');
					$('.form-horizontal').show();

					$('#id').val($(this).data('id'));
					$('#claim_criteria').val($(this).data('claim_criteria'));
					$('#status').val($(this).data('status'));

					$('#myModal').modal('show');

				});

				$('.modal-footer').on('click','.edit',function(){

					$.ajax({
						type: 'post',
						url: 'claimFeedback/acceptClaim',
						data: {
							'_token' : $('input[name=_token]').val(),
							'id' : $('input[name=id]').val(),
							'status' : $('textarea[name=status]').val()
							
						},	
						success: function(data){
							if(data.status != 'pending'){
								alert(data.status);
							}
							
							window.location.href = "claimFeedback";


						},
						error: function(){
							alert("Sorry, Something wrong...");
							console.log(response);


						}

					});
				});




				
				$(document).on('click', '.delete-modal',function(){
					
					$('#footer_action_button').text(" Reject");

					$('.actionBtn').addClass('btn-success');
					$('.actionBtn').addClass('delete');

					$('.modal-title').text('Send Feedback');
					$('.form-horizontal').show();

					$('#id').val($(this).data('id'));
					$('#claim_criteria').val($(this).data('claim_criteria'));
					$('#status').val($(this).data('status'));

					$('#myModal').modal('show');


				});

				$('.modal-footer').on('click', '.delete', function(){
					$.ajax({

						type:'post',
						url:' claimFeedback/rejectClaim',
						data:{
							'_token' : $('input[name=_token]').val(),
							'id' : $('input[name=id]').val(),
							'status' : $('textarea[name=status]').val()
						},
						success: function(data){
							if(data.status != 'pending'){
								alert(data.status);
							}
							window.location.href = "claimFeedback";


						},
						error: function(){
							alert("Sorry, Something wrong...");
							console.log(response);
						}
					});
				});

			</script>

			@endsection