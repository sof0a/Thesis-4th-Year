<!DOCTYPE html>
<html>
<head>
    <title>Driver Details</title>
</head>
<body>
    <h1>Driver Details</h1>
    <p>Name: {{ $driver->name }}</p>
    <p>License Number: {{ $driver->license_number }}</p>
    <p>Contact Number: {{ $driver->contact_number }}</p>
    <p>Model: {{ $driver->model }}</p>
    <p>Plate Number: {{ $driver->plate_number }}</p>
    <a href="{{ route('layouts.drivers') }}">Back to Drivers List</a>
</body>
</html>
