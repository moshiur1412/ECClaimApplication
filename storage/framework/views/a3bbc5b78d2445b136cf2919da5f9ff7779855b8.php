<?php $__env->startSection('content'); ?>
<div class="container">
	<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="<?php echo e(url('ecclaims/sendReports')); ?>">
		<?php echo csrf_field(); ?>


		<div class="form-group row add">
			<div class="form-group">
				<div class="col-md-3">
					<label for="name"> Select Assessment </label>
				</div>
				<div class="col-md-8">
					<select class="form-control" required name="assessment_id" id="role">
						<option value="0"> -- Please, Choose Your Subject Name -- </option>
						<?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						
						<option value="<?php echo e($subject->assessments->last()->id); ?>"><?php echo e($subject->name); ?></option>
					
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<p class="error error-name text-center alert alert-danger hidden"></p>	
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="claim_criteria"> Select EC Criteria </label>
				</div>
				<div class="col-md-8">
					<select class="form-control" required name="claim_criteria" id="role">
						<option value="0"> -- Please, Choose Your EC Criteria  -- </option>
						
						<option value="Physical Injury">Physical Injury </option>
						<option value="Mental Illness">Mental Illness </option>
						<option value="Family Issues">Family Issues</option>
						<option value="Resource Damage">Resource Damage	</option>
						
					</select>
					<p class="error error-ec_criteria text-center alert alert-danger hidden"></p>	
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<label for="note"> Your Relevant Case Message </label>
				</div>
				<div class="col-md-8">
					<textarea name="note" class="form-control" rows="10" placeholder="You can write your relevant case information..."></textarea>

					<p class="error error-note text-center alert alert-danger hidden"></p>		
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="exampleInputFile">Upload evidence file </label>
					<input type="file" class="form-control-file" id="claim_evidence" name="evidence_01" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">You will be asked to provide more detailed information if there is an eligibility issue on your claim.</small>
					<p class="error error-name text-center alert alert-danger hidden"></p>	
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="exampleInputFile">Upload evidence file </label>
					<input type="file" class="form-control-file" id="claim_evidence" name="evidence_02" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">You will be asked to provide more detailed information if there is an eligibility issue on your claim.</small>
					<p class="error error-name text-center alert alert-danger hidden"></p>	
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="exampleInputFile">Upload evidence file </label>
					<input type="file" class="form-control-file" id="claim_evidence" name="evidence_03" aria-describedby="fileHelp">
					<small id="fileHelp" class="form-text text-muted">You will be asked to provide more detailed information if there is an eligibility issue on your claim.</small>
					<p class="error error-name text-center alert alert-danger hidden"></p>	
				</div>
			</div>
			<div class="form-group">

				<div class="col-md-2">
					<button class="btn btn-warning" type="submit" id="add">	<?php echo e(trans('ecclaim.send_your_claim')); ?> </button>
				</div>	
			</div>
		</div>
	</form>



	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>