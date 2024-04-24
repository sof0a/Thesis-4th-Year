<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
    
    <form method="POST" action="<?php echo e(route('drivers.update', $driver->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <!-- Input fields for user data -->
        <input type="text" name="name" value="<?php echo e($driver->name); ?>">
        <input type="text" name="license_number" value="<?php echo e($driver->license_number); ?>">
        <input type="text" name="contact_number" value="<?php echo e($driver->contact_number); ?>">
        <input type="text" name="model" value="<?php echo e($driver->model); ?>">
        <input type="text" name="plate_number" value="<?php echo e($driver->plate_number); ?>">
        <!-- Submit button -->
        <button type="submit">Update</button>
    </form>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\drivers\edit.blade.php ENDPATH**/ ?>