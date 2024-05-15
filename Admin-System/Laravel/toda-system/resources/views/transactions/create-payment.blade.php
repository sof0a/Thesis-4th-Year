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

    <title>Dashboard</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            @include('layouts.sidebar', ['activeLink' => 'driver'])

            <!-- Content -->
            {{-- ADD enctype="multipart/form-data" --}}
            <form method="POST" action="{{ route('transactions.storeDriverPayment') }}" >
                <div class="col-8 content-create">
                    <a href="{{ route('transactions.driver')}}" class="btn-back">
                        <img class="btn-back"  src="{{ asset('images/right-arrow.png') }}">
                    </a>
                    <div class="container">
                        <h2 class="mt-4">Driver Payment Information</h2>
                        {{-- <h2>Driver Nickname, Age</h2> --}}
                    </div>
                    <div class="driver-info container d-flex align-items-center mt-5 mb-5">
                        <div class="infos">
                            <div class="info-label">
                                <label for="driver">Driver</label>
                                <label for="lName">Commission</label>
                                <label for="mName">Paid</label>
                                {{-- <label for="mName">Balance</label> --}}
                                <label for="mName">Status</label>
                            </div>
                            <div class="info m-0">
                                @csrf
                                <select name="driver_id">
                                    <option value="0" selected>Select a driver</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }}</option>
                                    @endforeach
                                </select>
                                <input  type="number" name="toda_commission" id="" placeholder="Commission" value="10">
                                <input type="number" name="toda_paid" id="" placeholder="Paid" value="" required>
                                {{-- <input type="number" name="toda_balance" id="" placeholder="Balance" value="{{ $balance }}" required> --}}
                                <select name="toda_payment_status" required>
                                    <option value="Completed">Completed</option>
                                    <option value="Pending" selected>Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container buttons mt-4">
                        @csrf
                        <button class="btn" type="submit">Submit</button>
                    </div>


                </div>
            </form>
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
