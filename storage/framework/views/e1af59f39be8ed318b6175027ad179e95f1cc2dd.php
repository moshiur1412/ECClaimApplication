<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<h1 class="header-title">EC Coordinator List</h1>
	</div>

	<div class="row">
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-md-6 text-center">
			<h3 class="text-uppercase"> <?php echo e($user->faculy_name); ?> </h3>
			<h5> User Name : <?php echo e($user->name); ?> </h5>
			<p> Email: <?php echo e($user->email); ?> </p>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>