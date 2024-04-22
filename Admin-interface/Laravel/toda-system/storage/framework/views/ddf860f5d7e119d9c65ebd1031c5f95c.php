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

    <title>Dashboard</title>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            <?php echo $__env->make('layouts.sidebar', ['activeLink' => 'drivers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content -->
            <div class="col-9 content">
                <div class="container">
                    <h2 class="mt-5">Driver Information</h2>
                    <h2>Driver Nickname, Age</h2>
                </div>
                <div class="driver-info container d-flex align-items-center mt-5 mb-5">
                    <img class="me-5" src="../images/driver-photo.jpg" alt="">
                    <div class="infos">
                        <div class="info m-0">
                            <h2><?php echo e($driver->name); ?></h2>
                            <input  type="text" name="fName" id="" placeholder="First Name" value="<?php echo e($driver->name); ?>">
                            <input type="text" name="lName" id="" placeholder="Last Name" value="">
                            <input type="text" name="mName" id="" placeholder="Middle Name" value="">
                        </div>
                        <div class="info mt-5">
                            <input type="date" name="bDay" id="" placeholder="Date of Birth" value="">
                            <input type="tel" name="contactNumber" id="" placeholder="Contact Number" value="<?php echo e($driver->contact_number); ?>">
                            <input type="text" name="licenseNumber" id="" placeholder="Driver's License" value="<?php echo e($driver->license_number); ?>">
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <h2>Vehicle Information</h2>
                </div>
                <div class="infos container mt-4">
                    <div class="info m-0">
                        <input  type="text" name="modelName" id="" placeholder="Model" value="<?php echo e($driver->model); ?>">
                        <input type="text" name="vehicleColor" id="" placeholder="Vehicle Color" value="">
                        <input type="text" name="plateNumber" id="" placeholder="Plate Number" value="<?php echo e($driver->plate_number); ?>">
                    </div>
                    <!-- <div class="info mt-5">
                        <input type="text" name="plateNumber" id="" placeholder="Plate Number" value="">
                    </div> -->
                </div>

                <div class="container buttons">
                    <button class="btn btn-primary add-vehicle">Update</button>
                    <a href="#" class="btn btn-danger delete-account">Delete Driver</a>
                </div>


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
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\drivers\show.blade.php ENDPATH**/ ?>