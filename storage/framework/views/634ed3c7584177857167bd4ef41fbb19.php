<!-- resources/views/admin_dashboard.blade.php -->



<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Pending Applications</h2>

    <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Candidate</th>
                <th>Job</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($application->candidate->name); ?></td>
                <td><?php echo e($application->job->title); ?></td>
                <td><?php echo e(ucfirst($application->status)); ?></td>
                <td>
                    <form action="<?php echo e(route('applications.update', $application->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" name="status" value="approved" class="btn btn-success">Approve</button>
                        <button type="submit" name="status" value="rejected" class="btn btn-danger">Reject</button>
                        <button type="submit" name="status" value="pending" class="btn btn-warning">Keep Pending</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\JobBoard\resources\views/admin_dashboard.blade.php ENDPATH**/ ?>