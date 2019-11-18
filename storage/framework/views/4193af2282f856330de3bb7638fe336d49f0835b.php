<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body settings-page">
	<div class="card">
		<div class="card-header">
			<h2>Recent posts sent to buffer</h2>
		</div>
		<div class="filter-options">
			<div class="row">
				<form action="filtered_posts" method="post">
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('GET')); ?>

					<div class="form-group">
						<div class="col-md-3">
							<input class="form-control" type="text" name="txtGroupName" placeholder="Search">
						</div>
						<div class="col-md-3">
							<input class="form-control" type="text" name="txtDate" value="<?php echo e($today); ?>">
						</div>
						<div class="col-md-3">
							<select class="form-control" id="cmbPostGroup">
								<option value="0">All Group</option>
								<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($group->group_id); ?>"><?php echo e($group->group_name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
			  <thead>
			    <tr class="table-active">
			      <th scope="col">Group Name</th>
			      <th scope="col">Group Type</th>
			      <th scope="col">Account Name</th>
			      <th scope="col">Post Text</th>
			      <th scope="col">Time</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <tr>
			      <th><?php echo e($post->group_name); ?></th>
			      <th><?php echo e($post->group_type); ?></th>
			      <td style="text-align: center;"><img style="width: 80px; border-radius: 50%;" src="<?php echo e($post->social_avatar); ?>"></td>
			      <td><?php echo e($post->post_text); ?></td>
			      <td><?php echo e($post->sent_at); ?></td>
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
			</table>
			<?php echo e($posts->links()); ?>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>