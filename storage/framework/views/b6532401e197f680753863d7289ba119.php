<!-- resources/views/jobs/create.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create New Job</h1>

    <form action="<?php echo e(route('jobs.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Job Description:</label>
            <input name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Job Type:</label>
            <input name="type" class="form-control" required>
        </div> 
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input name="deadline" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Create Job</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\JobBoard\resources\views/jobs/create.blade.php ENDPATH**/ ?>