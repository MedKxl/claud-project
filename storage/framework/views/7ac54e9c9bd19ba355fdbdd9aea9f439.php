

<?php $__env->startSection('title', 'Upload Document'); ?>

<?php $__env->startSection('content'); ?>
    <h2>Upload PDF or Word File</h2>

    <!DOCTYPE html>
<html>
<head>
    <title>Cloud Document Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-4">📤 Upload PDF or Word File</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('upload.file')); ?>" method="POST" enctype="multipart/form-data" class="mb-5">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Choose File</label>
            <input type="file" name="document" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form> 

</div>

</body>
</html>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cloudAnalytics\resources\views/upload.blade.php ENDPATH**/ ?>