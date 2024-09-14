<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    

    <?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Welcome to your Dashboard, <?php echo e(Auth::user()->username); ?>!</h1>
        <?php if(session('message')): ?>
            <div class="alert alert-info">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>
        <?php if(Auth::user()->user_role=='employer'): ?>
        <!-- Employer's dashboard -->
        <h2>Employer Panel</h2>
        <p>Manage your job postings, review applications, and access analytics.</p>
        <?php if(session('message')): ?>
            <div class="alert alert-info">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>
        <div class="dashboard-section">
            <h3>Your Job Listings</h3>
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Salary</th>
                            <th>Application Count</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($job->title); ?></td>
                                <td><?php echo e($job->location); ?></td>
                                <td><?php echo e($job->type); ?></td>
                                <td><?php echo e($job->salary); ?></td>
                                <td><?php echo e($job->application_count); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4">No jobs available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary">Announce New Job </a>
        </div>

        <div class="dashboard-section">
            <h3>Analytics</h3>
            <p>Track the performance of your job listings.</p>
            <!-- يمكن إضافة إحصائيات هنا -->
        </div>

        <?php elseif(Auth::user()->user_role=='candidate'): ?>
        <!-- Candidate's dashboard -->
        <h2>Candidate Panel</h2>
        <p>Search for jobs, apply to postings, and manage your profile.</p>
        <?php if(session('message')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('message')); ?>

                </div>
        <?php endif; ?>
        <div class="dashboard-section">
            <h3>Your Job Applications</h3>
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Applications Count</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($jobs)&& count($jobs)>0): ?>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($jobData['job']->title); ?></td>
                                    <td><?php echo e($jobData['application_count']); ?></td>
                                    <td><?php echo e($jobData['status']); ?></td>
                                </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No applications found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
        </div>

        <div class="dashboard-section">
            <h3>Search for Jobs</h3>
            <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-primary"> Register for Another Job</a>
  
        </div>  

        <?php elseif(Auth::user()->user_role=='admin'): ?>
        <!-- Admin's dashboard -->
        <h2>Admin Panel</h2>
        <p>Approve or reject job postings and monitor platform activity.</p>

        <div class="dashboard-section">
            <h3>Pending Job Postings</h3>
            <ul>
                <?php $__currentLoopData = $pendingJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($job->title); ?> - Posted by: <?php echo e($job->employer->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\JobBoard\resources\views/dashboard.blade.php ENDPATH**/ ?>