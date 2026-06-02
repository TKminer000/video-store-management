

<?php $__env->startSection('title', 'Add Movie — Video Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-film"></i> Add Movie
        </div>
        <a href="<?php echo e(route('movies.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
    <div class="form-card">
        <h2><i class="bi bi-plus-circle"></i> New Movie</h2>
        <form method="POST" action="<?php echo e(route('movies.store')); ?>">
            <?php echo csrf_field(); ?>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>" placeholder="e.g. The Matrix">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label>Category</label>
            <select name="category">
                <option value="">-- Select Category --</option>
                <?php $__currentLoopData = ['comedy','suspense','drama','action','SciFi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat); ?>" <?php echo e(old('category') == $cat ? 'selected' : ''); ?>><?php echo e(ucfirst($cat)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label>Director</label>
            <input type="text" name="director" value="<?php echo e(old('director')); ?>" placeholder="e.g. Christopher Nolan">
            <?php $__errorArgs = ['director'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label>Year</label>
            <input type="number" name="year" value="<?php echo e(old('year')); ?>" placeholder="e.g. 2024" min="1900" max="2099">
            <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-msg"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                <a href="<?php echo e(route('movies.index')); ?>" class="btn btn-secondary"><i class="bi bi-x"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/movies/create.blade.php ENDPATH**/ ?>