<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/custom.css">
    
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" placeholder="Enter your role" required>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Register here</a></p>
    </div>
</body><?php /**PATH C:\Users\dell\JobBoard\resources\views/auth/login.blade.php ENDPATH**/ ?>