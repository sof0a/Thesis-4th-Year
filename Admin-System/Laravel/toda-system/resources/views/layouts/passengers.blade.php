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

    <title>Passengers</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            @include('layouts.sidebar', ['activeLink' => 'passengers'])

            <!-- Content -->
            <div class="col-9 content">
                <h2 class="mt-5 fw-bold">Passengers</h2>

                <!--  Table Section -->
                <table class="table table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact #</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($passengers as $passenger)
                        <tr>
                            <th scope="row">{{ $passenger->passenger_id }}</th>
                            <td>{{ $passenger->name }}</td>
                            <td>{{ $passenger->contact_number }}</td>
                            <td>
                                <div class="Dstatus">
                                    <div class="driver-status-indicator" id="status-indicator"></div>
                                    <div class="status-text">{{ $passenger->status }}</div>
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
