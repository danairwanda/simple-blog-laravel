<!-- use view master with extends -->

	<!-- display content in section -->
	<?php $__env->startSection('content'); ?>
		<!-- show the title data -->
		<h2><?php echo e($blog->title); ?></h2>
		<!-- show the description data -->
		<p><?php echo e($blog->description); ?></p>
	<!-- end view detail -->
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>