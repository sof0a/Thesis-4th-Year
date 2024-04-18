<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="<?php echo e(asset('../node_modules/chart.js/dist/chart.umd.js')); ?>"></script>
</head>
<body>
    <canvas id="passengersPerDayChart"></canvas>

    <script>
        // Retrieve data passed from the controller
        var passengersPerDay = <?php echo json_encode($passengersPerDay); ?>;

        // Prepare data for Chart.js
        var driverNames = passengersPerDay.map(function(item) {
            return item.DriverName;
        });

        var transactionDates = passengersPerDay.map(function(item) {
            return item.TransactionDate;
        });

        var passengerCounts = passengersPerDay.map(function(item) {
            return item.PassengerCount;
        });

        // Create bar chart
        var ctx = document.getElementById('passengersPerDayChart').getContext('2d');
        var passengersPerDayChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: driverNames,
                datasets: [{
                    label: 'Passengers Per Day',
                    data: passengerCounts,
                    backgroundColor: [ '#f4bc1389' ],
                    borderColor: ['#f4bc13'],
                    borderWidth: 1,
                    borderRadius: 50,
                    barPercentage: 0.5
                }]


            },
            options: {
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
<?php /**PATH C:\xampp\htdocs\Laravel\toda-system\resources\views\analytics\passengers_per_day.blade.php ENDPATH**/ ?>