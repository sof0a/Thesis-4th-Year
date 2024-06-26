<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
</head>
<body>
    <canvas id="passengersPerDayChart"></canvas>

    <script>
        // Retrieve data passed from the controller
        var passengersPerPeriod = {!! json_encode($passengersPerPeriod) !!};

        // Prepare data for Chart.js
        var driverNames = passengersPerPeriod.map(function(item) {
            return item.DriverName;
        });

        var transactionDates = passengersPerPeriod.map(function(item) {
            return item.TransactionDate;
        });

        var passengerCounts = passengersPerPeriod.map(function(item) {
            return item.PassengerCount;
        });

        // Create bar chart
        var ctx = document.getElementById('passengersPerDayChart').getContext('2d');
        var passengersPerDayChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: driverNames,
                datasets: [{
                    label: 'No. Passenger',
                    data: passengerCounts,
                    backgroundColor: [ '#d2c972' ],
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
