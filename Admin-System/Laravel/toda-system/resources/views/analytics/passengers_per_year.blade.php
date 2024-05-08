<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
</head>
<body>
    <canvas id="passengersPerYearChart"></canvas>

    <script>
        // Retrieve data passed from the controller
        var passengersPerYear = {!! json_encode($passengersPerYear) !!};

        // Prepare data for Chart.js
        var driverNames = passengersPerYear.map(function(item) {
            return item.DriverName;
        });

        var transactionDates = passengersPerYear.map(function(item) {
            return item.TransactionDate;
        });

        var passengerCounts = passengersPerYear.map(function(item) {
            return item.PassengerCount;
        });

        // Create bar chart
        var ctx = document.getElementById('passengersPerYearChart').getContext('2d');
        var passengersPerYearChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: driverNames,
                datasets: [{
                    label: 'Passengers per Day',
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
