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
            @include('layouts.sidebar', ['activeLink' => 'driver'])

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Driver Transactions</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2">Driver ID</th>
                            <th scope="col" rowspan="2">Driver Name</th>
                            {{-- <th scope="col">Contact Number</th> --}}
                            <th scope="col" rowspan="2">Total Trips</th>
                            <th scope="col" colspan="4" style="text-align: center">Payment/day</th>
                            <th scope="col" rowspan="2">Action</th>
                            {{-- <th scope="col">TODA Payables</th>
                            <th scope="col">TODA Balance</th> --}}
                        </tr>
                        <tr class="subheader">
                            <th>Commision</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drivers as $driver)
    <tr>
        <td>{{ $driver->id }}</td>
        <td>{{ $driver->first_name . ' ' . $driver->last_name }}</td>

        {{-- Find the corresponding transaction for this driver --}}
        @php
            $transaction = $driverTransactions->where('driver_id', $driver->id)->first();
        @endphp

        {{-- Display the transaction details --}}
        @if($transaction)
            <td>{{ $transaction->total_trips }}</td>
        @else
            <td>0</td>
        @endif

        {{-- Display input fields for the driver's data --}}
        <form method="POST" action="{{ route('transactions.update-payments', $driver->id) }}">
            @csrf
            @method('PUT')
            <td> <!-- TODA Commission -->
                <input type="number" name="toda_commission" value="{{ $driver->toda_commission }}">
            </td>
            <td> <!-- TODA Paid -->
                <input type="number" name="toda_paid" value="{{ $driver->toda_paid }}">
            </td>
            <td> <!-- TODA Balance -->
                <input type="number" name="toda_balance" value="{{ $driver->toda_balance }}" readonly>
            </td>
            <td>
                <select name="toda_payment_status">
                    <option value="Completed" {{$driver->toda_balance == 0 ? 'selected' : '' }}>Completed</option>
                    <option value="Pending" {{$driver->toda_balance != 0 ? 'selected' : '' }}>Pending</option>
                </select>
            </td>
            <td>
                <button type="submit" class="">Save</button>
            </td>
        </form>
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
