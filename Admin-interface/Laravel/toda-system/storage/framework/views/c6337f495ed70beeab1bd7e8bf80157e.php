<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Dashboard</title>
    
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex main-container">
            <!-- Sidebar -->
            
            <?php echo $__env->make('layouts.sidebar', ['activeLink' => 'dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
            <!-- Content -->            
            <div class="col-9 content">
                <!-- Kiosk Status -->
                <div class="container d-flex" id="kioskStatus">
                    <h2 class="me-3">Kiosk Status</h2>
                    <div class="status" id="status">
                        <div class="status-indicator" id="status-indicator"></div>
                        <div class="status-text">Online</div>
                    </div>
                </div>

                <!-- Cards -->
                <div class="container d-flex justify-content-between">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title fs-1">255</h5>
                            <p class="card-text">Drivers</p>
                            <a href="#" class="btn">More info</a>
                        </div>
                    </div>
                    <div class="card mb-3"">
                        <div class="card-body">
                            <h5 class="card-title fs-1">538</h5>
                            <p class="card-text">Users</p>
                            <a href="#" class="btn">More info</a>
                        </div>
                    </div>
                    <div class="card mb-3"">
                        <div class="card-body">
                            <h5 class="card-title fs-1">435</h5>
                            <p class="card-text">Reports</p>
                            <a href="#" class="btn">More info</a>
                        </div>
                    </div>
                    <div class="card mb-3"">
                        <div class="card-body">
                            <h5 class="card-title fs-1">435</h5>
                            <p class="card-text">Reports</p>
                            <a href="#" class="btn">More info</a>
                        </div>
                    </div>
                </div>

                <!-- graphs -->
                <div class="container d-flex">
                    <div class="chart w-50 me-5">
                        <canvas id="barChart"></canvas>
                    </div>
                    <div class="chart w-50">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/status.js ')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo e(asset('js/chart1.js ')); ?>"></script>
    <script src="<?php echo e(asset('js/chart2.js ')); ?> "></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\layouts\dashboard.blade.php ENDPATH**/ ?>