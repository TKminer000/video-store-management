

<?php $__env->startSection('title', 'Add Tape — Video Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-cassette"></i> Add Tape
        </div>
        <a href="<?php echo e(route('tapes.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    <div class="form-card">
        <h2><i class="bi bi-plus-circle"></i> New Tape</h2>
        <form method="POST" action="<?php echo e(route('tapes.store')); ?>">
            <?php echo csrf_field(); ?>
            <label>Movie</label>
            <select name="movie_id">
                <option value="">-- Select Movie --</option>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($movie->movie_id); ?>" <?php echo e(old('movie_id') == $movie->movie_id ? 'selected' : ''); ?>>
                        <?php echo e($movie->title); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['movie_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label>Format</label>
            <select name="format">
                <option value="">-- Select Format --</option>
                <option value="VHS" <?php echo e(old('format') == 'VHS' ? 'selected' : ''); ?>>VHS</option>
                <option value="Beta" <?php echo e(old('format') == 'Beta' ? 'selected' : ''); ?>>Beta</option>
            </select>
            <?php $__errorArgs = ['format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                <a href="<?php echo e(route('tapes.index')); ?>" class="btn btn-secondary"><i class="bi bi-x"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/tapes/create.blade.php ENDPATH**/ ?>