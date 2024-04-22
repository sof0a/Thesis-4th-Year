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
        
        <?php $__currentLoopData = $transactionCount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactionCount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e($transaction->date); ?></h2>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <canvas id="barChart"></canvas>
    </div>

    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('js/analytics_charts.js ')); ?>"></script>

    <script>
        const ctx = document.getElementById('barChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Driver 1', 'Driver 2', 'Driver 3', 'Driver 4', 'Driver 5', 'Driver 6'],
                datasets: [{
                    label: 'Passenger',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [ '#f4bc1389' ],
                    borderColor: [
                        '#f4bc13'
                    ],
                    borderWidth: 1,
                    borderRadius: 50,
                    barPercentage: 0.5
                }]
            },
            options: {
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Override the aspect ratio to stretch
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views/analytics/passenger_graph.blade.php ENDPATH**/ ?>