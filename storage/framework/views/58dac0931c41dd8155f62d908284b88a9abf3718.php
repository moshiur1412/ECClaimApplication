<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title"> Assessments Details </h1>
		
	</div>
	<?php if(Auth::user()->role == 'Administrator'): ?>
	<div class="form-group row add">
		<div class="col-md-4">
			<select class="form-control" required name="faculty_id" id="selectCategory">
				<option value="0">-- Choose Faculty Name--</option>
				<?php $__currentLoopData = $faculites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($faculite->id); ?>"><?php echo e($faculite->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</select>
			<p class="error error-student_name text-center alert alert-danger hidden"></p>	
		</div>
		<div class="form-group col-md-4">
			<select class="form-control" required name="department_id" id="department_id"></select>
			<p class="error error-session_year text-center alert alert-danger hidden"></p>	
		</div>
		<div class="form-group col-md-4">

			<select class="form-control" required name="subject_id" id="subject_id"> </select>
			<p class="error error-session_year text-center alert alert-danger hidden"></p>	
		</div>

		<div class="form-group col-md-4">
			<input class="form-control" type="text" name="name" placeholder="Enter Assessment Title">
			<p class="error error-session_year text-center alert alert-danger hidden"></p>	

		</div>
		<div class="form-group col-md-4">
			<input class="form-control" type="date" name="deadline">
			<p class="error error-deadline text-center alert alert-danger hidden"></p>	
		</div>

		<div class="form-group col-md-4 ">
			<button class="btn btn-warning" type="submit" id="add">	Add New Assessment </button>
		</div>	

	</div>

	<script type="text/javascript">

		

		$("#selectCategory").change(function(){
			$('#department_id').empty();
			$('#department_id').append('<option value="0">-- Choose Department Name --</option>');
			$.ajax({
				type: 'post',
				url: 'assessments/selectDepartment',
				data: {
					'_token': $('input[name=_token]').val(),
					'faculty_id' : $('select[name=faculty_id]').val()

				},
				success:function(data){
					$.each(data, function(index, department){
						
						$('#department_id').append('<option value="'+department.id+'">'+department.name +'</option>');
					});

				},
				error:function(){
					alert('Sorry');
				}
			});
		});
		// add users -->
		$("#department_id").change(function(){
			$('#subject_id').empty();
			$('#subject_id').append('<option value="0">-- Choose Subject Name --</option>');
			$.ajax({
				type: 'post',
				url: 'assessments/selectSubject',
				data: {
					'_token': $('input[name=_token]').val(),
					'department_id' : $('select[name=department_id]').val()

				},
				success:function(data){
					$.each(data, function(index, department){

						$('#subject_id').append('<option value="'+department.id+'">'+department.name +'</option>');
					});

				},
				error:function(){
					alert('Sorry');
				}
			});
		});

	</script>

	<?php endif; ?>
	<div class="row">
		<div class="table-responsive">
			<table class="table table-borderless" id="table">
				<tr>
					<th><?php echo e(trans('student_enroll.table_no')); ?></th>
					<th> Assessments Title </th>
					<th> Subjects Name </th>
					<th> Assignment Deadline </th>
					<th> Actions </th>
					
				</tr>

				<?php echo e(csrf_field()); ?>


				<?php $no=1; ?>

				<?php $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="user<?php echo e($assessment->id); ?>">
					<td> <?php echo e($no++); ?> </td>
					<td> <?php echo e($assessment->name); ?> </td>
					<td> <?php echo e($assessment->subject->name); ?> </td>
					<td> <?php echo e($assessment->deadline); ?> </td> 
					<td> 
						<?php if(Auth::user()->role == 'Administrator'): ?>
						<button class="edit-modal btn btn-primary" data-id="<?php echo e($assessment->id); ?>" data-name="<?php echo e($assessment->name); ?>" data-subject_id="<?php echo e($assessment->subject_id); ?>" data-deadline="<?php echo e($assessment->deadline); ?>">EDIT </button>
						<button class="delete-modal btn btn-danger" data-id="<?php echo e($assessment->id); ?>" data-name="<?php echo e($assessment->name); ?>"  > </span> DELETE </button>
						<?php else: ?>
						Service is not allowed
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
			
			<?php echo e($assessments->links()); ?>

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
							<label for="id" class="control-label col-sm-2">ID</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fid" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="control-label col-sm-2">Assisment Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" id="n" required="required">
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="subject" class="control-label col-sm-2">Subject</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="subject_id" id="s">
							</div>
						</div> -->

						<div class="form-group">
							<label for="role" class="control-label col-sm-2">Assisment Deadline</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="deadline" id="d" required="required">
							</div>
						</div>
					</form>


					<div class="deleteContent"> Are you sure you want to delete <span class="user"></span> ? <span class="hidden id"></span> </div>

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
					$("#add").click(function(){

						$.ajax({
							type: 'post',
							url: 'assessments/addAssessment',
							data: {
								'_token': $('input[name=_token]').val(),
								'subject_id' : $('select[name=subject_id]').val(),
								'name' : $('input[name=name]').val(),
								'deadline' : $('input[name=deadline]').val()

							},
							success:function(data){
								if(data.errors){
									if((data.errors.student_name) && (data.errors.student_faculty_name) ){
										$('.error').removeClass('hidden');
										$('.error-student_name').text(data.errors.student_name);
										$('.error-student_faculty_name').text(data.errors.student_faculty_name);

									}else if((data.errors.student_name)){
										$('.error-student_faculty_name').addClass('hidden');
										$('.error-student_name').removeClass('hidden');
										$('.error-student_name').text(data.errors.student_name);
									}else if((data.errors.student_faculty_name)){
										$('.error-student_name').addClass('hidden');
										$('.error-student_faculty_name').removeClass('hidden');
										$('.error-student_faculty_name').text(data.errors.student_faculty_name);
									}	
								}else{

									$('.error').remove();

									window.location.href = "assessments";
								}
								

							},
							error:function(){
								alert('Sorry, Please check duplicated data !!!');

							}
						});


					});
				// Edit Data (Modal and function edit data)
				$(document).on('click','.edit-modal', function(){

					
					$('#footer_action_button').text(" Update");
					

					$('.actionBtn').addClass('btn-success');
					$('.actionBtn').removeClass('btn-danger');
					$('.actionBtn').addClass('edit');

					$('.modal-title').text('Edit User');
					$('.deleteContent').hide();
					$('.form-horizontal').show();

					$('#fid').val($(this).data('id'));
					$('#n').val($(this).data('name'));
					$('#s').val($(this).data('subject_id'));
					$('#d').val($(this).data('deadline'));

					$('#myModal').modal('show');

				});

				$('.modal-footer').on('click','.edit',function(){

					$.ajax({
						type: 'post',
						url: 'assessments/editAssessment',
						data: {
							'_token' : $('input[name=_token]').val(),
							'id' : $("#fid").val(),
							'name' : $("#n").val(),
							'deadline' : $("#d").val()
						},	
						success: function(data){
							
							window.location.href = "assessments";

						},
						error: function(){
							alert("Sorry, Something wrong...");
							console.log(response);


						}

					});
				});




				
				$(document).on('click', '.delete-modal',function(){
					$('#footer_action_button').text(" Delete");


					$('.actionBtn').removeClass('btn-success');
					$('.actionBtn').addClass('btn-danger');
					$('.actionBtn').addClass('delete')

					$('.modal-title').text('Delele Assisment');

					$('.id').text($(this).data('id'));
					$('.deleteContent').show();
					$('.form-horizontal').hide();

					$('.user').html($(this).data('name'));
					$('#myModal').modal('show');

				});

				$('.modal-footer').on('click', '.delete', function(){
					$.ajax({

						type:'post',
						url:'assessments/deleteAssessment',
						data:{
							'_token':$('input[name=_token').val(),
							'id':$('.id').text()
						},
						success:function(data){
							$('.user' +$('.id').text()).remove();
						}
					});
				});

			</script>
			
			<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>