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

                <!--  Completed Drivers Table Section -->
                <h3 class="mt-5">Completed Payments</h3>
                <table class="table table-hover mt-2 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Driver ID</th>
                            <th scope="col">Driver Name</th>
                            <th scope="col">Total Trips</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Paid</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($completedDrivers as $driver)
                            <tr>
                                <td>{{ $driver->driver_id }}</td>
                                <td>{{ $driver->first_name . ' ' . $driver->last_name }}</td>
                                <td>{{ $driver->total_trips }}</td>
                                <td>{{ $driver->toda_commission }}</td>
                                <td>{{ $driver->toda_paid }}</td>
                                <td>{{ $driver->toda_balance }}</td>
                                <td>{{ $driver->toda_payment_status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!--  Pending Drivers Table Section -->
                <h3 class="mt-5">Pending Payments</h3>
                <table class="table table-hover mt-2 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Driver ID</th>
                            <th scope="col">Driver Name</th>
                            <th scope="col">Total Trips</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Paid</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingDrivers as $driver)
                            <tr>
                                <td>{{ $driver->driver_id }}</td>
                                <td>{{ $driver->first_name . ' ' . $driver->last_name }}</td>
                                <td>{{ $driver->total_trips }}</td>
                                <form method="POST" action="{{ route('transactions.update-payments', $driver->driver_id) }}">
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
                                            <option value="Completed" {{ $driver->toda_balance == 0 ? 'selected' : '' }}>Completed</option>
                                            <option value="Pending" {{ $driver->toda_balance != 0 ? 'selected' : '' }}>Pending</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
