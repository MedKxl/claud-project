

<?php $__env->startSection('title', 'Search Documents'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h3 class="mb-4">🔍 Search in Uploaded Documents</h3>

        <form action="<?php echo e(route('search.perform')); ?>" method="POST" class="mb-5">
            <?php echo csrf_field(); ?>
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Enter keywords..." required>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <?php if(isset($results)): ?>
            <h5><?php echo e(count($results)); ?> result(s) found for "<strong><?php echo e($query); ?></strong>"</h5>
            <hr>

            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-5 border p-3 rounded bg-white shadow-sm">
                    <h5><?php echo e($result->title); ?></h5>
                    <p><strong>Filename:</strong> <?php echo e($result->file_name); ?></p>
                    <p><?php echo $result->highlighted; ?></p>

                    <?php
                        $extension = strtolower(pathinfo($result->file_name, PATHINFO_EXTENSION));
                    ?>

                    <?php if($extension === 'pdf'): ?>
                        <iframe src="https://docs.google.com/gview?url=<?php echo e(urlencode($result->public_url)); ?>&embedded=true"
                                width="100%" height="500px" frameborder="0"></iframe>
                    <?php else: ?>
                        <iframe src="https://docs.google.com/viewer?url=<?php echo e(urlencode($result->public_url)); ?>&embedded=true"
                                width="100%" height="500px" frameborder="0"></iframe>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\cloudAnalytics\resources\views/search.blade.php ENDPATH**/ ?>