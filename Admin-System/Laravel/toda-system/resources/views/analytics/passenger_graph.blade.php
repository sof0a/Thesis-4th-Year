<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passenger Graph</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/analytics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>
<body>
    <div class="chart me-3">
        <div class="container d-flex justify-content-between header" style="width: auto">
            <h2>Passengers</h2>
            <h2>Daily</h2>
        </div>
        {{-- <h1>Transaction Count: {{ $transactionCount }}</h1> --}}
        @foreach($transactionCount as $transactionCount)
        <h2>{{ $transaction->date }}</h2>
        @endforeach

        <canvas id="barChart"></canvas>
    </div>

    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
    <script src="{{ asset('js/analytics_charts.js ')}}"></script>

    <script>
        const ctx = document.getElementById('barChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Driver 1', 'Driver 2', 'Driver 3', 'Driver 4', 'Driver 5', 'Driver 6'],
                datasets: [{
                    label: 'Passenger',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [ '#d2c972' ],
                    borderColor: [
                        '#f4bc13'
                    ],
                    borderWidth: 1,
                    borderRadius: 50,
                    barPercentage: 0.5
                }]
            },
            options: {
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Override the aspect ratio to stretch
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
