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
        <canvas id="barChart"></canvas>
    </div>

    @foreach($transactions as $transaction)
        <h2>{{ $transaction->date }}</h2>
    @endforeach


    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
    <script src="{{ asset('js/analytics_charts.js ')}}"></script>
</body>
</html>
