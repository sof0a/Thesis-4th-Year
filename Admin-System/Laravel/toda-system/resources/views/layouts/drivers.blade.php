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

    <title>Drivers</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex">
            <!-- Sidebar -->
            @include('layouts.sidebar', ['activeLink' => 'drivers'])

            <!-- Content -->
            <div class="col-9 content">
                <div class="cotainer d-flex">
                    <h2 class="mt-5 fw-bold">Drivers</h2>
                    <a class="btn add mt-5" href="{{ route('drivers.create') }}">
                        ADD
                    </a>
                </div>
                <div class="table-container">
                    <!--  Table Section -->
                    <table class="table table-hover mt-5">
                        <thead>
                            <tr>
                                <th scope="col">RFID</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">License #</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Model</th>
                                <th scope="col">Plate #</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr>
                                <th scope="row">{{ $driver->rfid }}</th>
                                <td>
                                    <img src="{{ $driver->photo }}" alt="Driver's Photo">
                                </td>
                                <td>{{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }}</td>
                                <td>{{ $driver->license_number }}</td>
                                <td>{{ $driver->contact_number }}</td>
                                <td>{{ $driver->model }}</td>
                                <td>{{ $driver->plate_number }}</td>
                                <td>
                                    <div class="Dstatus">
                                        <div class="driver-status-indicator" id="status-indicator"></div>
                                        <div class="status-text">{{ $driver->status }}</div>
                                    </div>
                                </td>
                                <td id="btn-action">
                                    <a href="{{ route('drivers.show', $driver->id) }}">
                                        <img src="{{ asset('images/view-icon.png') }}" title="View">
                                    </a>
                                    <a href="{{ route('drivers.edit', $driver->id) }}">
                                        <img src="{{ asset('images/edit-icon.png') }}" title="Edit">
                                    </a>
                                    {{-- <form method="POST" action="{{ route('drivers.delete', $driver->id) }}"> --}}
                                    <form method="POST" class="btn-delete" action="{{ route('drivers.delete', $driver->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <img src="{{ asset('images/delete-icon.png') }}" title="Delete">
                                        </a> --}}
                                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this driver?')) { this.closest('form').submit(); }">
                                            <img src="{{ asset('images/delete-icon.png') }}" title="Delete">
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <a class="btn add mt-4" href="{{ route('drivers.create') }}">
                    ADD
                </a> --}}
            </div>
        </div>
    </div>
</body>
</html>
