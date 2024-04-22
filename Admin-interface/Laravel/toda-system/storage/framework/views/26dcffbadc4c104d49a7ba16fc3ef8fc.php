<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Form</title>
</head>
<body>
    <!-- resources/views/users/delete.blade.php -->
    <form method="POST" action="<?php echo e(route('users.destroy', $user->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <p>Are you sure you want to delete this user?</p>
        <button type="submit">Delete User</button>
    </form>

</body>
</html><?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\drivers\delete.blade.php ENDPATH**/ ?>