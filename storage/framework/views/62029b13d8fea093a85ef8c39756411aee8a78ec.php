<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title"> <?php echo e($departments->name); ?> </h1>
		
	</div>
	
	<div class="row">
		
		<?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<h2 class="text-center"><?php echo e($subject->name); ?> </h2>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>