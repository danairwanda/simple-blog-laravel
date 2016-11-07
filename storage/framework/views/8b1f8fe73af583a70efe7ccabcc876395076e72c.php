<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>CRUD Laravel 5.3</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<?php if(Session::has('alert-success')): ?>
					    <div class="alert alert-success">
				            <?php echo e(Session::get('alert-success')); ?>

				        </div>
					<?php endif; ?>
					<a href="<?php echo e(route('crud.create')); ?>" class="btn btn-info pull-right">Tambah Data</a><br><br>
					<table class="table table-striped">
						<tr>
							<th>No</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Email</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
						<?php $no=1; ?>
						<?php $__currentLoopData = $cruds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crud): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($no++); ?></td>
							<td><?php echo e($crud->firstname); ?></td>
							<td><?php echo e($crud->lastname); ?></td>
							<td><?php echo e($crud->email); ?></td>
							<td><?php echo e($crud->address); ?></td>
							<td>
								<form method="POST" action="<?php echo e(route('crud.destroy', $crud->id)); ?>" accept-charset="UTF-8">
		                            <input name="_method" type="hidden" value="DELETE">
		                            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
		                            <a href="<?php echo e(route('crud.edit', $crud->id)); ?>" class="btn btn-primary">Edit</a>
		                        	<input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">
		                        </form>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>