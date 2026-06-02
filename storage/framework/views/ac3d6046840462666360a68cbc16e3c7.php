

<?php $__env->startSection('title', 'Tapes — Video Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-cassette"></i> Tapes
        </div>
        <a href="<?php echo e(route('tapes.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Tape
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Tape #</th>
                    <th>Movie</th>
                    <th>Format</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $tapes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tape): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($tape->tape_number); ?></td>
                    <td><?php echo e($tape->movie_title); ?></td>
                    <td>
                        <span class="badge <?php echo e($tape->format == 'VHS' ? 'badge-vhs' : 'badge-beta'); ?>">
                            <?php echo e($tape->format); ?>

                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('tapes.edit', $tape->tape_number)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <?php if(session('role') == 'admin'): ?>
                            <form method="POST" action="<?php echo e(route('tapes.destroy', $tape->tape_number)); ?>">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger" onclick="return confirm('Delete this tape?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" style="text-align:center;color:#475569;padding:2rem;">No tapes yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/tapes/index.blade.php ENDPATH**/ ?>