<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/analytics.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script defer src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>

    <title>Analytics</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex main-container">
            <!-- Sidebar -->
            
            <?php echo $__env->make('layouts.sidebar', ['activeLink' => 'analytics'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content -->
            <div class="col-9 content">
                <h1>Analytics</h1>
                <!-- graphs -->
                <div class="container d-flex ">
                    <div class="row w-100">
                        <div class="col-8">
                            <div class="chart me-3">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>Passengers</h2>
                                    <h2>Daily</h2>
                                </div>
                                
                                <?php echo $__env->make('analytics.passengers_per_day', ['passengersPerDay' => $passengersPerDay], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>Frequent Places</h2>
                                    <h2></h2>
                                </div>
                                
                                <?php echo $__env->make('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container d-flex mt-2">
                    <div class="row w-100">
                        <div class="col-4">
                            <div class="chart me-3">
                                <h2 class="mb-4">Earnings</h2>
                                <table class="table table-hover custom-table">
                                    <thead>
                                        <tr>
                                            <th class="th1">Driver Name</th>
                                            <th class="th2">Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $earningsPerDriver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($earning->DriverName); ?></td>
                                            <td><?php echo e($earning->TotalEarnings); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>TODA Profit</h2>
                                    <h2>Daily</h2>
                                </div>
                                
                                
                                <?php echo $__env->make('analytics.toda_profit_per_day', ['dailyProfit' => $dailyProfit], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="<?php echo e(asset('js/status.js ')); ?>"></script>
    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chart1.js ')); ?>"></script>
    <script src="<?php echo e(asset('js/lineGraph.js ')); ?> "></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views/layouts/analytics.blade.php ENDPATH**/ ?>