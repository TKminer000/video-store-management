

<?php $__env->startSection('no-navbar', true); ?>

<?php $__env->startSection('content'); ?>
<div class="login-wrap">
    <div class="login-card">
        <div class="brand">
            <i class="bi bi-film"></i>
            <h1>Video Store</h1>
            <p>Sign in to your account</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <i class="bi bi-exclamation-circle"></i>
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login.post')); ?>">
            <?php echo csrf_field(); ?>
            <label>Username</label>
            <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="Enter username">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">

            <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; padding: 0.7rem;">
                <i class="bi bi-box-arrow-in-right"></i> Sign In
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/auth/login.blade.php ENDPATH**/ ?>