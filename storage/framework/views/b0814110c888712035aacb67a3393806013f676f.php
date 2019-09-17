<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title"> <?php echo e($departmant->name); ?> </h1> 
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
				<?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="subject<?php echo e($subject->id); ?>">
					<td> <?php echo e($no++); ?> </td>
					<td> <?php echo e($subject->name); ?> </td> 
					<td> <?php echo e($subject->assessment_title); ?> </td>
					<td> <?php echo e($subject->deadline); ?> </td> 
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>