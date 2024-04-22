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

    <title>Drivers</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            <?php echo $__env->make('layouts.sidebar', ['activeLink' => 'drivers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Drivers</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Driver ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">License #</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Model</th>
                            <th scope="col">Plate #</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($driver->id); ?></th>
                            <td>
                                <img src="<?php echo e($driver->photo); ?>" alt="Driver's Photo">
                            </td>
                            <td><?php echo e($driver->name); ?></td>
                            <td><?php echo e($driver->license_number); ?></td>
                            <td><?php echo e($driver->contact_number); ?></td>
                            <td><?php echo e($driver->model); ?></td>
                            <td><?php echo e($driver->plate_number); ?></td>
                            <td>
                                <a href="<?php echo e(route('drivers.edit', $driver->id)); ?>">Edit</a>
                                <a href="<?php echo e(route('drivers.show', $driver->id)); ?>">View</a>
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
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views/layouts/drivers.blade.php ENDPATH**/ ?>