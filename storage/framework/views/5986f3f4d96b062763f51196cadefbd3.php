
<!DOCTYPE html>
<html>
<head>
    <title>Test Title Extraction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
<div class="container">
    <h2>🔍 Test Title Extraction</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>  

    <form action="<?php echo e(route('extract.title')); ?>" method="POST" enctype="multipart/form-data" class="mt-4">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Choose PDF or Word file</label>
            <input type="file" name="document" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Extract Title</button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\cloudAnalytics\resources\views/extract.blade.php ENDPATH**/ ?>