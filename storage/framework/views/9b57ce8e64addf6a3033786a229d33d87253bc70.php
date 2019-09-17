<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title">Faculty Management </h1>
	</div>

	<div class="row">


		<?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-md-6">
			<h3 class="text-uppercase text-center"><?php echo e($faculty->name); ?> </h3>
			<?php $__currentLoopData = $faculty->departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<h4 class="text-center"> <a href="<?php echo e(Route('subjects', $department->id)); ?>"><?php echo e($department->name); ?></a> </h4>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>