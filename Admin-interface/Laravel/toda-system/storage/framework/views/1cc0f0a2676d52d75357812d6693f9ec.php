<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/driver.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script defer src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>

    <title>Transactions</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            <?php echo $__env->make('layouts.sidebar', ['activeLink' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Transactions</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Pickup Point</th>
                            <th scope="col">Dropoff Point</th>
                            <th scope="col">Fare Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($transaction->transaction_id); ?></th>
                            <td><?php echo e($transaction->pickup_point); ?></td>
                            <td><?php echo e($transaction->dropoff_point); ?></td>
                            <td><?php echo e($transaction->fare_amount); ?></td>
                            <td><?php echo e($transaction->date); ?></td>
                            <td>
                                <div class="Dstatus">
                                    <div class="driver-status-indicator" id="status-indicator"></div>
                                    <div class="status-text"><?php echo e($transaction->status); ?></div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views/layouts/transactions.blade.php ENDPATH**/ ?>