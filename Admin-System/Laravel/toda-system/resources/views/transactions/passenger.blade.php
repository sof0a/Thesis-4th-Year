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

    <title>Passenger Transactions</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            @include('layouts.sidebar', ['activeLink' => 'passenger'])

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Passenger Transactions</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Passenger ID</th>
                            <th scope="col">Passenger Name</th>
                            <th scope="col">Total Trips</th>
                            <th scope="col">Passenger Contact Number</th>
                            {{-- <th scope="col">Transaction Details</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($passengerTransactions  as $transaction)
                        <tr>
                            <td>{{ $transaction->passenger_id }}</td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ $transaction->total_trips }}</td>
                            <td>{{ $transaction->contact_number }}</td>
                            {{-- <td><a href="{{ route('transactions.details', ['id' => $transaction->passenger_id]) }}">View Details</a></td> --}}
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
