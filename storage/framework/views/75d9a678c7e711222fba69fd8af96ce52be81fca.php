<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title">Faculty Name: <?php echo e($faculty->name); ?></h1>
	</div>

	<div class="row">
		<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-md-12" >
			<h3 class="text-uppercase text-center"><?php echo e($department->name); ?> </h3>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>