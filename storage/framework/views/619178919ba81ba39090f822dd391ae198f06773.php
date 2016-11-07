<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>CRUD Laravel 5.3</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="<?php echo e(route('crud.update', $cruds->id)); ?>" method="post">
					<input name="_method" type="hidden" value="PATCH">
					<?php echo e(csrf_field()); ?>

						<div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
							<input type="text" name="firstname" class="form-control" placeholder="firstname" value="<?php echo e($cruds->firstname); ?>">
							<?php echo $errors->first('firstname', '<p class="help-block">:message</p>'); ?>

						</div>
						<div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
							<input type="text" name="lastname" class="form-control" placeholder="Nomor Handlastname" value="<?php echo e($cruds->lastname); ?>">
							<?php echo $errors->first('lastname', '<p class="help-block">:message</p>'); ?>

						</div>
						<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
							<input type="text" name="email" class="form-control" placeholder="email" value="<?php echo e($cruds->email); ?>">
							<?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

						</div>
						<div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
							<input type="text" name="address" class="form-control" placeholder="Nomor Handaddress" value="<?php echo e($cruds->address); ?>">
							<?php echo $errors->first('address', '<p class="help-block">:message</p>'); ?>

						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>