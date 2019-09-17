<?php $__env->startSection('content'); ?>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1><?php echo e(trans('ecclaim.claim_detials')); ?></h1>
		</div>	
	</div>
	

	<div class="row">
		<div class="table-responsive">
			<table class="table table-borderless" id="table">
				<tr>
					<th>Subject Name</th>
					<th>Sending Date</th>
					<th>Claim Criteria </th>
					<th>Claim Note </th>
					<th>Claim Evidence </th>
					<th>Status</th>
				</tr>

				<?php echo e(csrf_field()); ?>



				<?php $__currentLoopData = $ecclaims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecclaim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="ecclaim<?php echo e($ecclaim->id); ?>">
					<td> <?php echo e(empty($ecclaim->assessment) ? '' :  $ecclaim->assessment->subject->name); ?>   </td>
					<td> <?php echo e(Carbon\Carbon::parse($ecclaim->created_at)->format('jS F Y h:i:s A')); ?> </td> 
					<td> <?php echo e($ecclaim->claim_criteria); ?> </td> 
					<td> <?php echo e($ecclaim->note); ?> </td>
					<td> <a href="/uploads/<?php echo e($ecclaim->evidence_01); ?>"><?php echo str_limit($ecclaim->evidence_01, 15); ?></a>
						<br> <a href="/uploads/<?php echo e($ecclaim->evidence_02); ?>"><?php echo str_limit($ecclaim->evidence_02, 15); ?></a>
						<br> <a href="/uploads/<?php echo e($ecclaim->evidence_03); ?>"><?php echo str_limit($ecclaim->evidence_03, 15); ?></a> 
					</td>
					<td style="color:red;"> <?php echo e($ecclaim->status); ?> </td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
	
<?php echo e($ecclaims->links()); ?>


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
							<label for="name" class="control-label col-sm-2">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="n" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-sm-2">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="e" required="email">
							</div>
						</div>
						<div class="form-group" style="display: none;align-items: ">
							<label for="a" class="control-label col-sm-2">Last Login</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="a">
							</div>
						</div>
						<div class="form-group">
							<label for="role" class="control-label col-sm-2">Role</label>
							<div class="col-sm-10">
								<!-- <input type="text" class="form-control" id="r" > -->
								<select class="form-control" name="role" id="r">
									<option value="EC Manager" <?php if (("#r")=='EC Manager'){echo "selected";}?>>EC Manager</option>
									<option value="EC Coordinator" <?php if (("#r")=='EC Coordinator'){echo "selected";}?>>EC Coordinator</option>
									<option value="Student" <?php if (("#r")=='Student'){echo "selected";}?>>Student</option>
								</select>	
							</div>
						</div>
					</form>


					<div class="deleteContent">
						Are you sure you want to delete <span class="user"></span> ? <span class="hidden id"></span>
					</div>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>