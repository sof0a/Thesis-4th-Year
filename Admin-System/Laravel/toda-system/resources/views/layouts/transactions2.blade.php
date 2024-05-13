<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/driver.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>

    <title>Transactions</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            @include('layouts.sidebar', ['activeLink' => 'transactions'])

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Transactions</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Pickup Point</th>
                            <th scope="col">Dropoff Point</th>
                            <th scope="col">Fare Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">{{ $transaction->transaction_id }}</th>
                            <td>{{ $transaction->pickup_point }}</td>
                            <td>{{ $transaction->dropoff_point }}</td>
                            <td>{{ $transaction->fare_amount }}</td>
                            <td>{{ $transaction->date }}</td>
                            <td>
                                <div class="Dstatus">
                                    <div class="driver-status-indicator" id="status-indicator"></div>
                                    <div class="status-text">{{ $transaction->status }}</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
</body>
</html>
