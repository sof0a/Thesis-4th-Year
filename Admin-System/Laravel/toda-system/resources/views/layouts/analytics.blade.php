<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/analytics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <title>Analytics</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex main-container">
            <!-- Sidebar -->
            {{-- @include('layouts.sidebar') <!-- Include sidebar layout --> --}}
            @include('layouts.sidebar', ['activeLink' => 'analytics'])

            <!-- Content -->
            <div class="col-9 content">
                <div class="container d-flex justify-content-between">
                    <h1 class="head-title align-self-center">Analytics</h1>
                    <form method="GET" action="{{ route('layouts.analytics') }}" class="w-40 d-flex">
                        <h4 class="mt-2"><strong>Filter:</strong></h4>&nbsp;&nbsp;
                        <select class="form-select" name="filter" onchange="toggleCustomRangeFilter(this)">
                            @foreach ($filterOptions as $key => $value)
                                <option value="{{ $key }}" {{ $key == $filter ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <button class="btn select w-50" type="submit" style="margin-top: 0px !important; margin-left: 5px !important;">
                            Apply
                        </button>
                    </form>
                </div>
                <!-- graphs -->
                <div class="container d-flex ">
                    <div class="row w-100">
                        <div class="col-8">
                            <div class="chart me-3">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>Passengers</h2>
                                    {{-- <form method="GET" action="{{ route('layouts.analytics') }}" class="d-flex align-items-center">
                                        <select class="form-select" name="filter" onchange="toggleCustomRangeFilter(this)">
                                            @foreach ($filterOptions as $key => $value)
                                                <option value="{{ $key }}" {{ $key == $filter ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn select" type="submit" style="margin-top: 0px !important; margin-left: 5px !important;">
                                            Apply
                                        </button>
                                    </form> --}}

                                    <!-- Container for custom range date filter -->
                                    {{-- <div id="customRangeFilterContainer" class="container d-flex mt-2" style="display: none;">
                                        <form method="GET" action="{{ route('layouts.analytics') }}">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="start_date">Start Date:</label>
                                                    <input type="date" id="start_date" name="start_date">
                                                </div>
                                                <div class="col">
                                                    <label for="end_date">End Date:</label>
                                                    <input type="date" id="end_date" name="end_date">
                                                </div>
                                            </div>
                                            <button type="submit">Apply</button>
                                        </form>
                                    </div> --}}
                                </div>



                                {{-- <canvas id="barChart"></canvas> --}}
                                @include('analytics.passengers_per_day', ['passengersPerPeriod' => $passengersPerPeriod])
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-center header" style="width: auto">
                                    <h2>Frequent Places</h2>
                                    {{-- <form method="GET" action="{{ route('layouts.analytics') }}" class="d-flex align-items-center">
                                        <select class="form-select" name="filter" onchange="toggleCustomRangeFilter(this)">
                                            @foreach ($filterOptions as $key => $value)
                                                <option value="{{ $key }}" {{ $key == $filter ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn select" type="submit" style="margin-top: 0px !important; margin-left: 5px !important;">
                                            Apply
                                        </button>
                                    </form> --}}
                                </div>
                                {{-- <canvas id="lineChart"></canvas> --}}
                                @include('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container d-flex mt-2">
                    <div class="row w-100">
                        <div class="col-4">
                            <div class="chart me-3">
                                <h2 class="mb-4">Earnings</h2>
                                <table class="table table-hover custom-table">
                                    <thead>
                                        <tr>
                                            <th class="th1">Driver Name</th>
                                            <th class="th2">Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($earningsPerDriver as $earning)
                                        <tr>
                                            <td>{{ $earning->DriverName }}</td>
                                            <td>{{ $earning->TotalEarnings }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>TODA Profit</h2>
                                    {{-- <form method="GET" action="{{ route('layouts.analytics') }}" class="d-flex align-items-center">
                                        <select class="form-select" name="filter" onchange="toggleCustomRangeFilter(this)">
                                            @foreach ($filterOptions as $key => $value)
                                                <option value="{{ $key }}" {{ $key == $filter ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn select" type="submit" style="margin-top: 0px !important; margin-left: 5px !important;">
                                            Apply
                                        </button>
                                    </form> --}}
                                </div>
                                {{-- <canvas id="barChart2"></canvas> --}}
                                {{-- @include('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints]) --}}
                                @include('analytics.toda_profit_per_day', ['dailyProfit' => $dailyProfit])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/status.js ') }}"></script>
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
    <script src="{{ asset('js/chart1.js ')}}"></script>
    <script src="{{ asset('js/lineGraph.js ')}} "></script>
    <script>
        function toggleCustomRangeFilter(select) {
            var customRangeFilterContainer = document.getElementById('customRangeFilterContainer');
            if (select.value === 'custom') {
                customRangeFilterContainer.style.display = 'flex'; // Show the container
            } else {
                customRangeFilterContainer.style.display = 'none'; // Hide the container
            }
        }
    </script>
</body>
</html>
