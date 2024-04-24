<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <form method="POST" action="<?php echo e(route('drivers.store')); ?>">
        <?php echo csrf_field(); ?>
        <!-- Input fields for driver data -->
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <!-- Submit button -->
        <button type="submit">Create User</button>
    </form>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\drivers\create.blade.php ENDPATH**/ ?>