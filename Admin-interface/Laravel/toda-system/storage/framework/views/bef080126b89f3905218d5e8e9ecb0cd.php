<!-- resources/views/layouts/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Layout</title>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/global.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script defer src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script>

</head>
<body>
    <div class="col-3 p-5 d-flex flex-column sidenav">
        <div class="logo">
            <img src="<?php echo e(asset('images/TrikGo-logo.png')); ?>" alt="Logo TrikGo"/>
            <h1 class="">TrikGo</h1>
        </div>
        <a class="row mt-5 tab <?php echo e($activeLink === 'dashboard' ? 'active' : ''); ?>" href="/dashboard">
                <img src="<?php echo e(asset('images/dashboard.png')); ?>">
                <h5 class="m-0">Dashboard</h5>
        </a>
        <a class="row mt-4 tab <?php echo e($activeLink === 'drivers' ? 'active' : ''); ?>" href="/drivers">
            <img src="<?php echo e(asset('images/driver-icon.png')); ?>" >
            <h5 class="m-0">Driver</h5>
        </a>
        
        <a class="row mt-4 tab <?php echo e($activeLink === 'users' ? 'active' : ''); ?>" href="/users">
                <img src="<?php echo e(asset('images/user-icon.ico')); ?>">
                <h5 class="m-0">User</h5>
        </a>
        <a class="row mt-4 tab <?php echo e($activeLink === 'analytics' ? 'active' : ''); ?>" href="/analytics">
            <img src="<?php echo e(asset('images/analytics-icon.png' )); ?>">
            <h5 class="m-0">Analytics</h5>
        </a>
        <a class="row mt-4 tab <?php echo e($activeLink === 'transaction' ? 'active' : ''); ?>" href="/transactions">
            <img src="<?php echo e(asset('images/transaction-icon.png ')); ?>">
            <h5 class="m-0">Transactions</h5>
        </a>

        <!-- <button class="btn btn-primary mt-5" id="toggleStatus"></button> -->
        
        <div class="container d-flex justify-content-between mt-5">
            <a class="row mt-4 settings mt-5" href="../views/user.html">
                <img src="<?php echo e(asset('/images/user-icon.ico ')); ?>">
            </a>
            <a class="row mt-4 settings mt-5" href="../views/logout.html">
                <img src="<?php echo e(asset('images/logout-icon.png ')); ?>">
            </a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\layouts\sidebar.blade.php ENDPATH**/ ?>