<!-- use view master with extends -->

	<!-- show the message notification -->
	<?php echo e(Session::get('message')); ?>

		<!-- display content with section -->
		<?php $__env->startSection('content'); ?>
		<!-- title of page -->
		<h1>Tutorial Laravel 5.3 blog</h1>
			<!-- begin foreach, loop to get all data from database here -->
			<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<!-- link to home page with id via named title -->
				<h2><a href="/blog/<?php echo e($blog->id); ?>"><?php echo e($blog->title); ?></a></h2>
				<!-- show the complete date  -->
				<?php echo e(date('F d, Y', strtotime($blog->created_at))); ?>

				<!-- show the description data -->
				<p><?php echo e($blog->description); ?></p>
				<!-- link to edit page with id -->
				<a href="blog/<?php echo e($blog->id); ?>/edit">Edit this post</a>
				<!-- begin the form action post data -->
				<form action="blog/<?php echo e($blog->id); ?>" method="post">
					<!-- input hidden delete -->
					<input type="hidden" name="_method" value="delete">
					<!-- input hidden token -->
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<!-- submit the data -->
					<input type="submit" name="delete" value="delete">
				<!-- end the form page -->
				</form>
			<!-- end foreach-->
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<!-- pagination -->
		<?php echo $blogs->links(); ?>

	<!-- stop extends -->
	<?php $__env->stopSection(); ?>

	<!-- display content with section -->
	<?php $__env->startSection('sidebar2'); ?>
		<!-- title -->
		<h4>Archives</h4>
		<!-- begin foreach, loop to get all data from database here -->
		<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<!-- ordered list item -->
			<ol class="list-unstyled">
				<!-- list item -->
				<li>
					<!-- link to blog with id description -->
					<a href="/blog/<?php echo e($blog->id); ?>"><?php echo e($blog->description); ?></a>
				</li>
			</ol>
		<!-- endforeach -->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<!-- end -->
	<?php $__env->stopSection(); ?>



<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>