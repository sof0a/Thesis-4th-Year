<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
</head>
<body>
    {{-- {{ dd($driver->model) }} --}}
    <form method="POST" action="{{ route('drivers.update', $driver->id) }}">
        @csrf
        @method('PUT')
        <!-- Input fields for user data -->
        <input type="text" name="name" value="{{ $driver->name }}">
        <input type="text" name="license_number" value="{{ $driver->license_number }}">
        <input type="text" name="contact_number" value="{{ $driver->contact_number }}">
        <input type="text" name="model" value="{{ $driver->model }}">
        <input type="text" name="plate_number" value="{{ $driver->plate_number }}">
        <!-- Submit button -->
        <button type="submit">Update</button>
    </form>

</body>
</html>
