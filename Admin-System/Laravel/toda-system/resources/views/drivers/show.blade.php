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
            <div class="col-9 content">
                <a href="{{ route('layouts.drivers')}}" class="btn-back">
                    <img class="btn-back"  src="{{ asset('images/right-arrow.png') }}">
                </a>
                <div class="container">
                    <h2 class="mt-4">Driver Information</h2>
                    <h2>Driver Nickname, Age</h2>
                </div>
                <div class="driver-info container d-flex align-items-center mt-5 mb-5">
                    <img class="me-5" src="../images/driver-photo.jpg" alt="">
                    <div class="infos">
                        <div class="info-label">
                            <label for="fName">First Name</label>
                            <label for="lName">Last Name</label>
                            <label for="mName">Middle Name</label>
                        </div>
                        <div class="info m-0">
                            <input  type="text" name="first_name" id="" placeholder="First Name" value="{{ $driver->first_name }}">
                            <input type="text" name="last_name" id="" placeholder="Last Name" value="{{ $driver->last_name }}">
                            <input type="text" name="middle_name" id="" placeholder="Middle Name" value="{{ $driver->middle_name }}">
                        </div>
                        <div class="info-label label2 mt-5">
                            <label for="rfid">RFID</label>
                            <label for="contactNumber">Contact Number</label>
                            <label class="label-lNum" for="licenseNumber">License Number</label>
                        </div>
                        <div class="info">
                            {{-- <input type="date" name="bDay" id="" placeholder="Date of Birth" value=""> --}}
                            <input type="text" name="rfid" id="" placeholder="RFID" value="{{ $driver->rfid }}">
                            <input type="tel" name="contactNumber" id="" placeholder="Contact Number" value="{{ $driver->contact_number }}">
                            <input type="text" name="licenseNumber" id="" placeholder="Driver's License" value="{{ $driver->license_number }}">
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <h2>Vehicle Information</h2>
                </div>
                <div class="infos container mt-4">
                    <div class="info-label label3">
                        <label for="modelName">Model Name</label>
                        <label for="plateNumber">Plate Number</label>
                    </div>
                    <div class="info m-0">
                        <input  type="text" name="modelName" id="" placeholder="Model" value="{{ $driver->model }}">
                        {{-- <input type="text" name="vehicleColor" id="" placeholder="Vehicle Color" value=""> --}}
                        <input type="text" name="plateNumber" id="" placeholder="Plate Number" value="{{ $driver->plate_number }}">
                    </div>
                    <!-- <div class="info mt-5">
                        <input type="text" name="plateNumber" id="" placeholder="Plate Number" value="">
                    </div> -->
                </div>

                <div class="container buttons">
                    <div class="container2-btn d-flex">
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-primary"
                            style="background-color: #666014 !important; ">Edit</a>
                        <form method="POST" action="{{ route('drivers.delete', $driver->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="btn"
                            style="background-color: red !important; color: white">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
