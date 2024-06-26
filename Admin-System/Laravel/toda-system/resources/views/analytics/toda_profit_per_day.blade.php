<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
</head>
<body>
    <canvas id="todaProfitPerDayChart"></canvas>

    <script>

        var ctx = document.getElementById('todaProfitPerDayChart').getContext('2d');
        var todaProfitPerDayChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dailyProfit->pluck('transaction_date')) !!},
                datasets: [{
                    label: 'Total Profit',
                    data: {!! json_encode($dailyProfit->pluck('total_profit')) !!},
                    backgroundColor: '#d2c972',
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
