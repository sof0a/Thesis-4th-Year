<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
</head>
<body>
    <canvas id="todaProfitPerDayChart"></canvas>

    <script>

        var ctx = document.getElementById('todaProfitPerDayChart').getContext('2d');
        var todaProfitPerDayChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dailyProfit->pluck('transaction_date')); ?>,
                datasets: [{
                    label: 'Total Profit',
                    data: <?php echo json_encode($dailyProfit->pluck('total_profit')); ?>,
                    backgroundColor: '#f4bc1389',
                    borderColor: '#f4bc13',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views/analytics/toda_profit_per_day.blade.php ENDPATH**/ ?>