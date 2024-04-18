<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
</head>
<body>
    <canvas id="frequentPickPoints"></canvas>

    <script>
        // Retrieve data passed from the controller
        var frequentPickupPoints = <?php echo json_encode($frequentPickupPoints); ?>;

        // Sort pickupPoints and pickupCounts based on pickupCounts in descending order
        var sortedData = frequentPickupPoints.sort((a, b) => b.pickup_count - a.pickup_count);

        // Prepare data for Chart.js
        var pickupPoints = sortedData.map(function(item) {
            return item.pickup_point;
        });

        var pickupCounts = sortedData.map(function(item) {
            return item.pickup_count;
        });

        // Define the color scale
        var colorScale = chroma.scale(['#ffff00', '#ff0000']).mode('lab');

        // Generate colors based on frequency
        var backgroundColor = pickupCounts.map(function(count, index) {
            var brightness = count / pickupCounts[0]; // Normalize the count to the range [0, 1]
            return colorScale(brightness).hex();
        });

        // Create pie chart
        var ctx = document.getElementById('frequentPickPoints').getContext('2d');
        var frequentPickPointsChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: pickupPoints,
                datasets: [{
                    label: 'Number of Occurrences',
                    data: pickupCounts,
                    backgroundColor: backgroundColor,
                    borderColor: '#f4bc13',
                    hoverOffset: 4
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
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\analytics\frequent_pickup_point.blade.php ENDPATH**/ ?>