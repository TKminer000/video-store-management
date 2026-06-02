

<?php $__env->startSection('title', 'Dashboard — Video Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="welcome-box">
        <h2>Welcome back, <?php echo e(session('name')); ?> :D</h2>
        <p>Manage your video store inventory below.</p>
    </div>

    <div class="cards-grid">
        <a href="<?php echo e(route('movies.index')); ?>" class="dash-card">
            <i class="bi bi-film"></i>
            <h3>Movies</h3>
            <p>Manage movies</p>
        </a>
        <a href="<?php echo e(route('tapes.index')); ?>" class="dash-card">
            <i class="bi bi-cassette"></i>
            <h3>Tapes</h3>
            <p>Manage tapes</p>
        </a>
        <a href="<?php echo e(route('actors.index')); ?>" class="dash-card">
            <i class="bi bi-people"></i>
            <h3>Actors</h3>
            <p>Manage actors</p>
        </a>
        <a href="<?php echo e(route('shelves.index')); ?>" class="dash-card">
            <i class="bi bi-archive"></i>
            <h3>Shelves</h3>
            <p>Manage shelves</p>
        </a>
        <a href="<?php echo e(route('audit-logs')); ?>" class="dash-card">
            <i class="bi bi-journal-text"></i>
            <h3>Audit Logs</h3>
            <p>View activity</p>
        </a>
        <?php if(session('role') == 'admin'): ?>
        <a href="<?php echo e(route('users.index')); ?>" class="dash-card">
            <i class="bi bi-person-gear"></i>
            <h3>Users</h3>
            <p>Manage users</p>
        </a>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/dashboard.blade.php ENDPATH**/ ?>