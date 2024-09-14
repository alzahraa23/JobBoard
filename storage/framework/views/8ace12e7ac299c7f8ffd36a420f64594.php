 <!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Job Board'); ?></title>
    <!-- تضمين ملفات CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('jobs.index')); ?>">Jobs</a></li> 
                <li><a href="<?php echo e(route('jobs.create')); ?>">Post a Job</a></li>
                <!-- إذا كان المستخدم مسجلاً الدخول -->
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('home')); ?>"><?php echo e(Auth::user()->name); ?></a></li>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <!-- عرض الرسائل الفورية (Flash Messages) -->
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- عرض المحتوى المخصص -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo e(date('Y')); ?> Job Board. All Rights Reserved.</p>
    </footer>

    <!-- تضمين ملفات JavaScript -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\dell\JobBoard\resources\views/layouts/app.blade.php ENDPATH**/ ?>