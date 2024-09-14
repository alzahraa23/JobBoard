<!-- resources/views/jobs/index.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container mt-4" >
        <h1 class="mb-4">Job Listings</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>location</th>
                    <th>category</th>
                    <th>salary</th>
                    <th>type</th>
                    <th>deadline</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($job->id); ?></td>
                    <td><?php echo e($job->title); ?></td>
                    <td><?php echo e($job->description); ?></td>
                    <td><?php echo e($job->location); ?></td>
                    <td><?php echo e($job->category); ?></td>
                    <td><?php echo e($job->salary); ?></td>
                    <td><?php echo e($job->type); ?></td>
                    <td><?php echo e($job->deadline); ?></td>
                    <td>
                        <form action="<?php echo e(route('applications.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\JobBoard\resources\views/jobs/index.blade.php ENDPATH**/ ?>