<!-- use view master with extends -->

	<!-- display content in section -->
	<?php $__env->startSection('content'); ?>
		<!-- title the details page -->
		<h2>Add New Post</h2>
			<!-- begin form -->
			<form  class="" action="/blog" method="post">
				<!-- input title with error notification -->
				<?php echo e(($errors->has('title')) ? $errors->first('title') : ''); ?> <br>
				<input type="text" name="title" placeholder="this is title"> <br>
				<!-- textarea description with error notification -->
				<?php echo e(($errors->has('description')) ? $errors->first('description') : ''); ?> <br>
				<textarea name="description" cols="40" rows="10" placeholder="this is description"></textarea> <br>	
				<!-- input for hidden token -->
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<!-- submit the form input -->
				<input type="submit" name="name" value="post">
			<!-- end form -->
			</form>
		<!-- end view create -->
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>