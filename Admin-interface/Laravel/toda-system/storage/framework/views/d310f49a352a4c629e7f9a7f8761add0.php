<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passenger Graph</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/analytics.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script defer src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>
</head>
<body>
    <div class="chart me-3">
        <div class="container d-flex justify-content-between header" style="width: auto">
            <h2>Passengers</h2>
            <h2>Daily</h2>
        </div>
        <canvas id="barChart"></canvas>
    </div>

    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e($transaction->date); ?></h2>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('js/analytics_charts.js ')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\transactions\index.blade.php ENDPATH**/ ?>