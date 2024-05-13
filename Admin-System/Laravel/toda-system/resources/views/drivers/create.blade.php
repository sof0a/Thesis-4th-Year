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
            @include('layouts.sidebar', ['activeLink' => 'drivers'])

            <!-- Content -->
            {{-- ADD enctype="multipart/form-data" --}}
            <form method="POST" action="{{ route('drivers.store') }}" >
                <div class="col-8 content-create">
                    <a href="{{ route('layouts.drivers')}}" class="btn-back">
                        <img class="btn-back"  src="{{ asset('images/right-arrow.png') }}">
                    </a>
                    <div class="container">
                        <h2 class="mt-4">Driver Information</h2>
                        <h2>Driver Nickname, Age</h2>
                    </div>
                    <div class="driver-info container d-flex align-items-center mt-5 mb-5">
                        <img class="me-5" src="../images/driver-photo.jpg" alt="">
                        {{-- <input type="file" name="image" accept="image/*"> --}}

                        <div class="infos">
                            <div class="info m-0">
                                @csrf
                                <input  type="text" name="first_name" id="" placeholder="First Name" value="">
                                <input type="text" name="last_name" id="" placeholder="Last Name" value="">
                                <input type="text" name="middle_name" id="" placeholder="Middle Name" value="">
                            </div>
                            <div class="info mt-5">
                                @csrf
                                <input type="text" name="rfid" id="" placeholder="RFID">
                                <input type="tel" name="contact_number" id="" placeholder="Contact Number" value="">
                                <input type="text" name="license_number" id="" placeholder="License Number" value="">
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <h2>Vehicle Information</h2>
                    </div>
                    <div class="infos container mt-4">
                        <div class="info m-0">
                            @csrf
                            <input  type="text" name="model" id="" placeholder="Model" value="">
                            {{-- <input type="text" name="vehicleColor" id="" placeholder="Vehicle Color" value=""> --}}
                            <input type="text" name="plate_number" id="" placeholder="Plate Number" value="">
                        </div>
                        <!-- <div class="info mt-5">
                            <input type="text" name="plateNumber" id="" placeholder="Plate Number" value="">
                        </div> -->
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
