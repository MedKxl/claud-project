

<?php $__env->startSection('title', 'Documents List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4">📚 Stored Cloud Documents</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php if(count($documents) > 0): ?>
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>File Name</th>
                    <th>Size (KB)</th>
                    <th>Category</th>
                    <th>Uploaded At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($doc->title); ?></td>
                        <td><?php echo e($doc->file_name); ?></td>
                        <td><?php echo e($doc->size_kb); ?></td>
                        <td><span class="badge bg-info text-dark"><?php echo e($doc->category ?? '—'); ?></span></td>
                        <td><?php echo e($doc->uploaded_at); ?></td>
                        <td>
                            <a href="<?php echo e($doc->public_url); ?>" target="_blank" class="btn btn-sm btn-primary">
                                Open in Viewer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No documents found.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cloudAnalytics\resources\views/documents.blade.php ENDPATH**/ ?>