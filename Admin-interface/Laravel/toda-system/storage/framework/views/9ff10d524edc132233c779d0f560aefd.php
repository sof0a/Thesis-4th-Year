<!DOCTYPE html>
<html>
<head>
    <title>Driver Details</title>
</head>
<body>
    <h1>Driver Details</h1>
    <p>Name: <?php echo e($driver->name); ?></p>
    <p>License Number: <?php echo e($driver->license_number); ?></p>
    <p>Contact Number: <?php echo e($driver->contact_number); ?></p>
    <p>Model: <?php echo e($driver->model); ?></p>
    <p>Plate Number: <?php echo e($driver->plate_number); ?></p>
    <a href="<?php echo e(route('layouts.drivers')); ?>">Back to Drivers List</a>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\drivers\show1.blade.php ENDPATH**/ ?>