<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Dashboard</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex main-container">
            <!-- Sidebar -->
            {{-- @include('layouts.sidebar') <!-- Include sidebar layout --> --}}
            @include('layouts.sidebar', ['activeLink' => 'dashboard'])

            <!-- Content -->
            <div class="col-9 content">
                <!-- Kiosk Status -->
                <div class="container d-flex" id="kioskStatus">
                    <h2 class="me-3">Kiosk Status</h2>
                    <div class="status" id="status">
                        <div class="status-indicator" id="status-indicator"></div>
                        <div class="status-text">Online</div>
                    </div>
                </div>

                <!-- Cards -->
                <div class="container d-flex justify-content-between">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon">
                                <h2 class="card-title">Driver</h2>
                                <h1 class="card-text">{{ $totalDrivers }}</h1>
                            </div>
                            <img class="icon" src="{{ asset('images/trik-icon.png') }}">
                        </div>
                        <a href="{{ route('layouts.drivers')}}" class="btn moreInfo">More info</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="icon">
                                <h2 class="card-title">Users</h2>
                                <h1 class="card-text">{{ $totalUsers }}</h1>
                            </div>
                            <img class="icon" src="{{ asset('images/user_icon.png') }}">
                        </div>
                        <a href="{{ route('layouts.passengers')}}" class="btn moreInfo">More info</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="icon">
                                <h2 class="card-title">Trip</h2>
                                <h1 class="card-text">{{ $totalTrips }}</h1>
                            </div>
                            <img class="icon" src="{{ asset('images/trips-icon.png') }}">
                        </div>
                        <a href="{{ route('layouts.transactions')}}" class="btn moreInfo">More info</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="icon">
                                <h2 class="card-title">Admin</h2>
                                <h1 class="card-text">{{ $totalAdmins }}</h1>
                            </div>
                            <img class="icon" src="{{ asset('images/admin-icon.png') }}">
                        </div>
                        <a href="#" class="btn moreInfo"
                        style="background-color: #aeaeae !important">
                        More info</a>
                    </div>
                </div>

                <!-- graphs -->
                <div class="container d-flex m-0">
                    <div class="col-8">
                        <div class="chart me-3">
                            <div class="d-flex justify-content-between header">
                                <h2>Passengers</h2>
                                <h2>Daily</h2>
                                <a href="{{ route('layouts.analytics')}}" class="btn-nxt">
                                    <img class="btn-icon"  src="{{ asset('images/right-icon.png') }}">
                                </a>
                            </div>
                            @include('analytics.passengers_per_day', ['passengersPerPeriod' => $passengersPerPeriod])
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="chart me-3">
                            <div class="container d-flex justify-content-between header mt-0" style="width: auto">
                                <h2>Frequent Places</h2>
                                <a href="{{ route('layouts.analytics')}}" class="btn-nxt">
                                    <img class="btn-icon"  src="{{ asset('images/right-icon.png') }}">
                                </a>
                            </div>
                            @include('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/status.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart1.js ')}}"></script>
    <script src="{{ asset('js/chart2.js ')}} "></script>
</body>
</html>
