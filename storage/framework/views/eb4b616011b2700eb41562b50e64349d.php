

<?php $__env->startSection('title', 'Audit Logs — Video Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <i class="bi bi-journal-text"></i> Audit Logs
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Table</th>
                    <th>Details</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($log->id); ?></td>
                    <td>
                        <span style="display:flex;align-items:center;gap:0.4rem;">
                            <i class="bi bi-person-circle" style="color:#818cf8;"></i>
                            <?php echo e($log->username); ?>

                        </span>
                    </td>
                    <td>
                        <?php if($log->action == 'CREATE'): ?>
                            <span class="badge" style="background:#052e16;color:#86efac;border:1px solid #166534;">
                                <i class="bi bi-plus-circle"></i> CREATE
                            </span>
                        <?php elseif($log->action == 'UPDATE'): ?>
                            <span class="badge" style="background:#1e3a5f;color:#93c5fd;border:1px solid #1e40af;">
                                <i class="bi bi-pencil"></i> UPDATE
                            </span>
                        <?php else: ?>
                            <span class="badge" style="background:#2d0a0a;color:#fca5a5;border:1px solid #991b1b;">
                                <i class="bi bi-trash"></i> DELETE
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span style="color:#94a3b8;font-family:monospace;"><?php echo e($log->table_affected); ?></span>
                    </td>
                    <td><?php echo e($log->details); ?></td>
                    <td style="color:#64748b;font-size:0.8rem;"><?php echo e($log->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" style="text-align:center;color:#475569;padding:2rem;">No logs yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Charlz keneth\video_store\resources\views/audit_logs.blade.php ENDPATH**/ ?>